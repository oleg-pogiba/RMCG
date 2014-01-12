<?php
/**
 * Конфигурационный файл модуля
 *
 * @package yupe.modules.category.install
 * @since 0.1
 *
 */
return array(
	'module' => array(
		'class' => 'application.modules.category.CategoryModule',
	),
	'import' => array(
		'application.modules.category.models.*',
	),
	'component' => array(),
	'rules' => array(),
);