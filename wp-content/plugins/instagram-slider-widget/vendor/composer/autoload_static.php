<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit420c56dfad06cb0b11be107ed337197a
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit420c56dfad06cb0b11be107ed337197a::$classMap;

        }, null, ClassLoader::class);
    }
}