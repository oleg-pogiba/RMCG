<?php
/**
 * Виджет для вывода popup-информации о пользователе:
 *
 * @package   yupe.modules.user.widgets
 */

Yii::import('application.modules.user.models.User');

class UserPopupInfoWidget extends YWidget
{
	public $model = null;
	public $view = 'user-popup-info';

	public function run()
	{
		if ($this->model === null || $this->model instanceof User === false) {
			return null;
		}

		$this->render($this->view, array('model' => $this->model));
	}
}