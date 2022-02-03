<?
$arJsConfig = [
    'contacts' => [
        'css' => SITE_TEMPLATE_PATH . '/libs/template/contacts/main.css',
        'css' => SITE_TEMPLATE_PATH . '/libs/template/contacts/adaptive.css',
        'js' => SITE_TEMPLATE_PATH . '/libs/template/contacts/header-popup.js',
        'skip_core' => true,
    ],
    
];
foreach ($arJsConfig as $ext => $arExt) {
    \CJSCore::RegisterExt($ext, $arExt);
}
?>