<?php
/**
 *
 * Файл конфигурации модуля
 *
 * @category YupeForms
 * @package  yupe.modules.install.forms
 * @author   YupeTeam <team@yupe.ru>
 * @license  BSD https://raw.github.com/yupe/yupe/master/LICENSE
 * @version  0.0.1
 * @link     http://yupe.ru
 **/
return array(
	'install' => true,
	'rules' => array(
		// правила контроллера site
		//{ author="Pogiba" date="2014-01-19" desc="Home page"
		//'/' => 'site/index'
		'/' => 'homepage/hp/index'
		//}
	),
);