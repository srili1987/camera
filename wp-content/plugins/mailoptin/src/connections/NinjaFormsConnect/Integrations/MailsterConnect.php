<?php

namespace MailOptin\NinjaFormsConnect\Integrations;

use MailOptin\Connections\Init;
use MailOptin\Core\AjaxHandler;
use MailOptin\Core\Connections\ConnectionFactory;
use MailOptin\Core\OptinForms\ConversionDataBuilder;
use function MailOptin\Core\moVar;

class MailsterConnect extends \NF_Abstracts_ActionNewsletter
{
    public $connection_name = 'Mailster';

    public $connection = 'MailsterConnect';

    protected $_timing = 'late';
    protected $_priority = '9';

    public function __construct()
    {
        // call these before parent constructor.
        $this->_name                 = $this->connection;
        $this->_nicename             = $this->connection_name . ' (MailOptin)';
        $this->_transient_expiration = HOUR_IN_SECONDS;

        parent::__construct();

        // removes field grouping cos we don't need it.
        unset($this->_settings[$this->get_name() . 'newsletter_list_groups']);

        $this->setup_settings();
    }

    public function process($action_settings, $form_id, $data)
    {
        $list_id = moVar($action_settings, 'newsletter_list');

        $optin_data = new ConversionDataBuilder();
        // since it's non mailoptin form, set it to zero.
        $optin_data->optin_campaign_id   = 0;
        $optin_data->payload             = $action_settings;
        $optin_data->name                = moVar($action_settings, 'moName');
        $optin_data->email               = moVar($action_settings, 'moEmail');
        $optin_data->optin_campaign_type = esc_html__('Ninja Forms', 'mailoptin');

        $optin_data->connection_service    = $this->connection;
        $optin_data->connection_email_list = $list_id;

        $optin_data->user_agent                = esc_html($_SERVER['HTTP_USER_AGENT']);
        $optin_data->is_timestamp_check_active = false;

        if (isset($_REQUEST['referrer'])) {
            $optin_data->conversion_page = esc_url_raw($_REQUEST['referrer']);
        }

        if ( ! empty($action_settings['moTags'])) {
            $optin_data->form_tags = $action_settings['moTags'];
        }

        foreach ($action_settings as $key => $value) {

            // ...Check to see if the key contains the $list_id and continue on if it does not.
            if (false !== strpos($key, $list_id)) {

                // ...Remove the $list_id from the $key.
                $field = str_replace($list_id . '_', '', $key);

                if ( ! empty($value)) {
                    $optin_data->form_custom_field_mappings[$field] = $key;
                }
            }


            if (0 === strpos($key, 'moTags_')) {
                // Use substr, instead of str_replace, to avoid false positives in the key.
                $key                     = substr($key, strlen('moTags_'));
                $optin_data->form_tags[] = $key;
            }
        }

        AjaxHandler::do_optin_conversion($optin_data);
    }

    public function connection_instance()
    {
        return ConnectionFactory::make($this->connection);
    }

    public function get_list_fields($list_id)
    {
        $nf_fields[] = [
            'value' => 'moEmail',
            'label' => sprintf(esc_html__('Email %srequired%s', 'mailoptin'), '<small style="color:red">(', ')</small>'),
        ];

        $nf_fields[] = [
            'value' => 'moName',
            'label' => esc_html__('Full Name', 'mailoptin')
        ];

        $instance = $this->connection_instance();

        if (defined('MAILOPTIN_DETACH_LIBSODIUM') && in_array($instance::OPTIN_CUSTOM_FIELD_SUPPORT, $instance::features_support())) {

            $fields = $instance->get_optin_fields($list_id);

            if ( ! empty($fields)) {

                foreach ($fields as $value => $label) {
                    $nf_fields[] = [
                        'value' => $list_id . '_' . $value,
                        'label' => $label
                    ];
                }
            }
        }

        return $nf_fields;
    }

    public function get_lists()
    {
        $lists = $this->connection_instance()->get_email_list();

        $nf_lists = [];

        if (is_array($lists)) {
            foreach ($lists as $key => $value) {
                $nf_lists[] = [
                    'value'  => $key,
                    'label'  => $value,
                    'fields' => $this->get_list_fields($key)
                ];
            }
        }

        return $nf_lists;
    }

    private function setup_settings()
    {
        $instance = $this->connection_instance();

        if ( ! defined('MAILOPTIN_DETACH_LIBSODIUM')) {
            $upgrade_url   = 'https://mailoptin.io/pricing/?utm_source=wp_dashboard&utm_medium=upgrade&utm_campaign=ninja_forms_builder_settings';
            $learnmore_url = 'https://mailoptin.io/?utm_source=wp_dashboard&utm_medium=upgrade&utm_campaign=ninja_forms_builder_settings';

            $output = '<div style="background-color: #d9edf7;border: 1px solid #bce8f1;box-sizing: border-box;color: #31708f;outline: 0;padding: 5px 10px">';
            $output .= '<p>' . sprintf(esc_html__('Upgrade to %s to remove the 500 subscribers per month limit, add support for custom field mapping and assign tags to subscribers.', 'mailoptin'), '<strong>MailOptin premium</strong>') . '</p>';
            $output .= '<p><a href="' . $upgrade_url . '" style="margin-right: 10px;" class="button-primary" target="_blank">' . esc_html__('Upgrade to MailOptin Premium', 'mailoptin') . '</a>';
            $output .= sprintf(esc_html__('%sLearn more about us%s', 'mailoptin'), '<a href="' . $learnmore_url . '" target="_blank">', '</a>') . '</p>';
            $output .= '</div>';

            $this->_settings['moupsell'] = array(
                'name'  => 'moupsell',
                'type'  => 'html',
                'group' => 'primary',
                'value' => $output,
                'width' => 'full'
            );

            return;
        };

        if (in_array($this->connection, Init::select2_tag_connections()) && method_exists($instance, 'get_tags')) {

            $tags = $instance->get_tags();

            if ( ! empty($tags)) {
                foreach ($tags as $key => $label) {
                    $key                   = 'moTags_' . $key;
                    $this->_settings[$key] = array(
                        'name'  => $key,
                        'type'  => 'toggle',
                        'label' => $label,
                        'group' => 'motags',
                        'width' => 'full'
                    );
                }
            }
        }

        if (in_array($this->connection, Init::text_tag_connections())) {

            $this->_settings['moTags'] = array(
                'name'           => 'moTags',
                'type'           => 'textbox',
                'label'          => esc_html__('Tags', 'mailoptin'),
                'group'          => 'primary',
                'width'          => 'full',
                'placeholder'    => __('Comma-separated list of tags to assign to leads', 'mailoptin'),
                'use_merge_tags' => false
            );
        }
    }

    /**
     * Singleton poop.
     *
     * @return self
     */
    public static function get_instance()
    {
        static $instance = null;

        if (is_null($instance)) {
            $instance = new self();
        }

        return $instance;
    }
}