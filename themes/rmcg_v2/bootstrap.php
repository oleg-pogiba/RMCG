<?php
/**
 * Theme bootstrap file.
 */
// We need to do this to ensure that assets was published even if we don't use any booster widget on the page
//if (Yii::app()->hasComponent('bootstrap')) {
//	Yii::app()->getComponent('bootstrap');
//}

// Get clientScript component
$clientScript = Yii::app()->getClientScript();

// Get assetManager component
$assetManager = Yii::app()->getAssetManager();

// Publish theme assets, note that we keep assets in web folder
$assetPath = $assetManager->publish(
    Yii::app()->theme->basePath . '/web'
);

// Styles
$styles = array(
    'main.css',
    'flags.css',
    'wowslider.css',
	'bootstrap.css',
);
foreach ($styles as $style) {
    $clientScript->registerCssFile($assetPath . '/css/' . $style);
}

// Javascript
$scripts = array(
	'jquery.js' => CClientScript::POS_HEAD,
	'script.js' => CClientScript::POS_END,
	'unslider.js' => CClientScript::POS_HEAD,
	'unslider.min.js' => CClientScript::POS_HEAD,
	'wowslider.js' => CClientScript::POS_HEAD,
	'bootstrap.min.js' => CClientScript::POS_HEAD,
);
foreach ($scripts as $script => $position) {
    $clientScript->registerScriptFile($assetPath . '/js/' . $script, $position);
}
if (Yii::app()->hasComponent('highlightjs')) {
    Yii::app()->highlightjs->loadClientScripts();
}
$clientScript->registerScript('baseUrl', "var baseUrl = '" . Yii::app()->getBaseUrl() . "'", CClientScript::POS_HEAD);

// Favicon
$clientScript->registerLinkTag('shortcut icon', null, $assetPath . '/images/favicon.ico');