(window.vcvWebpackJsonp4x=window.vcvWebpackJsonp4x||[]).push([[0],{"./node_modules/raw-loader/index.js!./textBlock/editor.css":function(e,t){e.exports=".vce-text-block {\n  min-height: 1em;\n}\n"},"./textBlock/index.js":function(e,t,s){"use strict";s.r(t);var n=s("./node_modules/vc-cake/index.js"),a=s.n(n),o=s("./node_modules/@babel/runtime/helpers/extends.js"),i=s.n(o),l=s("./node_modules/@babel/runtime/helpers/classCallCheck.js"),r=s.n(l),c=s("./node_modules/@babel/runtime/helpers/createClass.js"),u=s.n(c),p=s("./node_modules/@babel/runtime/helpers/assertThisInitialized.js"),d=s.n(p),m=s("./node_modules/@babel/runtime/helpers/inherits.js"),g=s.n(m),h=s("./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js"),b=s.n(h),v=s("./node_modules/@babel/runtime/helpers/getPrototypeOf.js"),y=s.n(v),f=s("./node_modules/react/index.js"),k=s.n(f);function x(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var s,n=y()(e);if(t){var a=y()(this).constructor;s=Reflect.construct(n,arguments,a)}else s=n.apply(this,arguments);return b()(this,s)}}var j=function(e){g()(s,e);var t=x(s);function s(e){var n;return r()(this,s),(n=t.call(this,e)).updateElementAssets=n.updateElementAssets.bind(d()(n)),n}return u()(s,[{key:"updateElementAssets",value:function(e,t,s){this.updateElementAssetsWithExclusion(this.props.id,s,["output","customClass","metaCustomId"])}},{key:"render",value:function(){var e=this.props,t=e.id,s=e.atts,n=e.editor,a=s.output,o=s.customClass,l=s.metaCustomId,r="vce-text-block",c={};"string"==typeof o&&o&&(r=r.concat(" "+o)),l&&(c.id=l);var u=this.applyDO("all");return k.a.createElement("div",i()({className:r},n,c),k.a.createElement("div",i()({className:"vce-text-block-wrapper vce",id:"el-"+t},u),a))}}]),s}(a.a.getService("api").elementComponent);(0,a.a.getService("cook").add)(s("./textBlock/settings.json"),(function(e){e.add(j)}),{css:!1,editorCss:s("./node_modules/raw-loader/index.js!./textBlock/editor.css")},"")},"./textBlock/settings.json":function(e){e.exports=JSON.parse('{"output":{"type":"htmleditor","access":"public","value":"<h2>Typography is the art and technique</h2>\\n<p>Typography is the art and technique of arranging type to make written language legible, readable and appealing when displayed. The arrangement of type involves selecting typefaces, point size, line length, line-spacing (leading), letter-spacing (tracking), and adjusting the space within letters pairs (kerning).</p>","options":{"label":"Content","inline":true,"skinToggle":"darkTextSkin","dynamicField":true}},"darkTextSkin":{"type":"toggleSmall","access":"public","value":false},"designOptions":{"type":"designOptions","access":"public","value":{},"options":{"label":"Design Options"}},"editFormTab1":{"type":"group","access":"protected","value":["output","metaCustomId","customClass"],"options":{"label":"General"}},"metaEditFormTabs":{"type":"group","access":"protected","value":["editFormTab1","designOptions"]},"metaBackendLabels":{"type":"group","access":"protected","value":[{"value":["output"]}]},"relatedTo":{"type":"group","access":"protected","value":["General"]},"metaOrder":{"type":"number","access":"protected","value":3},"customClass":{"type":"string","access":"public","value":"","options":{"label":"Extra class name","description":"Add an extra class name to the element and refer to it from the custom CSS option."}},"assetsLibrary":{"access":"public","type":"string","value":["animate"]},"metaCustomId":{"type":"customId","access":"public","value":"","options":{"label":"Element ID","description":"Apply a unique ID to the element to link it directly by using #your_id (for element ID use lowercase input only)."}},"tag":{"access":"protected","type":"string","value":"textBlock"}}')}},[["./textBlock/index.js"]]]);