<?php
/**
 * Файл отображения для default/show:
 *
 * @category YupeViews
 * @package  yupe
 *
 **/

/**
 * Добавляем нужный CSS:
 */
Yii::app()->clientScript->registerCssFile(
    Yii::app()->assetManager->publish(
        Yii::getPathOfAlias('application.modules.docs.views.assets') . '/css/main.css'
    )
);

$this->breadcrumbs=array(
    $this->module->name => array('index'),
    $title
);

echo $content;