<?php
/**
 * Виджет для отображения информации о модуле
 * Используется в панели управления
 *
 * @category YupeWidget
 * @package  yupe.modules.yupe.widgets

 *
 **/
class YModuleInfo extends YWidget
{
    public $module;

    public $view = 'moduleinfowidget';

    public function init()
    {
        if (!$this->module && is_object($this->controller->module))
            $this->module = $this->controller->module;
    }

    public function run()
    {
        $this->render($this->view, array('module' => $this->module));
    }
}