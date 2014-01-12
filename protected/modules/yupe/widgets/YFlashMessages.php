<?php
/**
 * Виджет для отображения flash-сообщений
 *
 * @category YupeWidget
 * @package  yupe.modules.yupe.widgets

 *
 **/
class YFlashMessages extends YWidget
{
    const SUCCESS_MESSAGE = 'success';
    const INFO_MESSAGE = 'info';
    const WARNING_MESSAGE = 'warning';
    const ERROR_MESSAGE = 'error';

    public $options = array();

    public $view = 'flashmessages';

    public function run()
    {
        $this->render($this->view, array('options' => $this->options));
    }
}