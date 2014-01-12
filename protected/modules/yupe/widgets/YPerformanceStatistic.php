<?php

/**
 * Виджет для отображения отладочной иформации (потребление памяти, время выполнения, кол-во запросов)
 *
 * @category YupeWidget
 * @package  yupe.modules.yupe.widgets
 *
 **/
class YPerformanceStatistic extends YWidget
{
	public $view = 'stat';

	public function run()
	{
		$dbStat = Yii::app()->db->getStats();
		$memory = round(Yii::getLogger()->memoryUsage / 1024 / 1024, 3);
		$time = round(Yii::getLogger()->executionTime, 3);
		$this->render($this->view, array('dbStat' => $dbStat, 'time' => $time, 'memory' => $memory));
	}
}