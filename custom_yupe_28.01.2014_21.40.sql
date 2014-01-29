-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(150) NOT NULL,
  `lang` char(2) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `short_description` text,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `level` int(11) DEFAULT '0',
  `root` int(11) DEFAULT '0',
  `lft` int(11) DEFAULT '0',
  `rgt` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_category_category_alias_lang` (`alias`,`lang`),
  KEY `ix_category_category_status` (`status`),
  KEY `ix_category_category_level` (`level`),
  KEY `ix_category_category_root` (`root`),
  KEY `ix_category_category_lft` (`lft`),
  KEY `ix_category_category_rgt` (`rgt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `content_block`
--

CREATE TABLE IF NOT EXISTS `content_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `content` text NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_contentblock_content_block_code` (`code`),
  KEY `ix_contentblock_content_block_type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `content_block`
--

INSERT INTO `content_block` (`id`, `name`, `code`, `type`, `content`, `description`) VALUES
(1, 'footer', 'footer', 1, '\r\n	footer\r\n', ''),
(2, 'banner', 'banner', 1, '\r\n	banner\r\n', '');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `answer_user` int(11) DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  `change_date` datetime NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `theme` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `answer` text NOT NULL,
  `answer_date` datetime DEFAULT NULL,
  `is_faq` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ix_feedback_feedback_category` (`category_id`),
  KEY `ix_feedback_feedback_type` (`type`),
  KEY `ix_feedback_feedback_status` (`status`),
  KEY `ix_feedback_feedback_isfaq` (`is_faq`),
  KEY `ix_feedback_feedback_answer_user` (`answer_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_menu_menu_code` (`code`),
  KEY `ix_menu_menu_status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `code`, `description`, `status`) VALUES
(1, 'Верхнее меню', 'top-menu', 'Основное меню сайта, расположенное сверху в блоке mainmenu.', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_item`
--

CREATE TABLE IF NOT EXISTS `menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `regular_link` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(150) NOT NULL,
  `href` varchar(150) NOT NULL,
  `class` varchar(150) NOT NULL,
  `title_attr` varchar(150) NOT NULL,
  `before_link` varchar(150) NOT NULL,
  `after_link` varchar(150) NOT NULL,
  `target` varchar(150) NOT NULL,
  `rel` varchar(150) NOT NULL,
  `condition_name` varchar(150) DEFAULT '0',
  `condition_denial` int(11) DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `ix_menu_menu_item_menu_id` (`menu_id`),
  KEY `ix_menu_menu_item_sort` (`sort`),
  KEY `ix_menu_menu_item_status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `menu_item`
--

INSERT INTO `menu_item` (`id`, `parent_id`, `menu_id`, `regular_link`, `title`, `href`, `class`, `title_attr`, `before_link`, `after_link`, `target`, `rel`, `condition_name`, `condition_denial`, `sort`, `status`) VALUES
(1, 0, 1, 0, 'Главная', '/homepage/hp/index', '', 'Главная страница сайта', '', '', '', '', '', 0, 1, 1),
(3, 2, 1, 0, 'Пользователи', '/user/people/index', '', 'Пользователи', '', '', '', '', '', 0, 3, 0),
(5, 0, 1, 0, 'Войти', '/user/account/login', 'login-text', 'Войти на сайт', '', '', '', '', 'isAuthenticated', 1, 11, 1),
(6, 0, 1, 0, 'Выйти', '/user/account/logout', 'login-text', 'Выйти', '', '', '', '', 'isAuthenticated', 0, 12, 1),
(7, 0, 1, 0, 'Регистрация', '/user/account/registration', 'login-text', 'Регистрация на сайте', '', '', '', '', 'isAuthenticated', 1, 10, 1),
(8, 0, 1, 0, 'Панель управления', '/yupe/backend/index', 'login-text', 'Панель управления сайтом', '', '', '', '', 'isSuperUser', 0, 100, 1),
(10, 0, 1, 0, 'Контакты', '/feedback/contact/index', '', 'Контакты', '', '', '', '', '', 0, 7, 1),
(11, 0, 1, 0, 'Новости', '/news/news/index', '', '', '', '', '', '', '', 0, 14, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_migrations_module` (`module`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `module`, `version`, `apply_time`) VALUES
(1, 'user', 'm000000_000000_user_base', 1389535493),
(2, 'user', 'm131019_212911_user_tokens', 1389535494),
(3, 'user', 'm131025_152911_clean_user_table', 1389535505),
(4, 'user', 'm131026_002234_prepare_hash_user_password', 1389535507),
(5, 'user', 'm131106_111552_user_restore_fields', 1389535508),
(6, 'user', 'm131121_190850_modify_tokes_table', 1389535510),
(7, 'yupe', 'm000000_000000_yupe_base', 1389535517),
(8, 'yupe', 'm130527_154455_yupe_change_unique_index', 1389535519),
(9, 'category', 'm000000_000000_category_base', 1389535522),
(10, 'category', 'm131103_044317_category_nestedsets', 1389535530),
(11, 'news', 'm000000_000000_news_base', 1389535535),
(12, 'menu', 'm000000_000000_menu_base', 1389535538),
(13, 'menu', 'm121220_001126_menu_test_data', 1389535539),
(14, 'menu', 'm131017_064101_fix_menu_test_data', 1389535539),
(15, 'page', 'm000000_000000_page_base', 1389535544),
(16, 'page', 'm130115_155600_columns_rename', 1389535546),
(17, 'contentblock', 'm000000_000000_contentblock_base', 1390086621),
(18, 'feedback', 'm000000_000000_feedback_base', 1390115450);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `lang` char(2) DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  `change_date` datetime NOT NULL,
  `date` date NOT NULL,
  `title` varchar(250) NOT NULL,
  `alias` varchar(150) NOT NULL,
  `short_text` text,
  `full_text` text NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `link` varchar(300) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `keywords` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_news_news_alias_lang` (`alias`,`lang`),
  KEY `ix_news_news_status` (`status`),
  KEY `ix_news_news_user_id` (`user_id`),
  KEY `ix_news_news_category_id` (`category_id`),
  KEY `ix_news_news_date` (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `category_id`, `lang`, `creation_date`, `change_date`, `date`, `title`, `alias`, `short_text`, `full_text`, `image`, `link`, `user_id`, `status`, `is_protected`, `keywords`, `description`) VALUES
(1, NULL, 'ru', '2014-01-19 16:10:58', '2014-01-19 16:10:58', '2014-01-19', 'Тестовая новость', 'testovaja-novost', '<p>\r\n	Тестовая новость\r\n</p>', '<p>\r\n	Тестовая новость\r\n</p>', NULL, '', 1, 1, 0, '', ''),
(2, NULL, 'uk', '2014-01-19 16:12:31', '2014-01-19 16:17:19', '2014-01-19', 'Тестовая новость ukr', 'testovaja-novost', '<p>\r\n	 ukr\r\n</p>', '<p>\r\n	 ukr\r\n</p>', NULL, '', 1, 1, 0, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `lang` char(2) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  `change_date` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `change_user_id` int(11) DEFAULT NULL,
  `title_short` varchar(150) NOT NULL,
  `title` varchar(250) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `body` text NOT NULL,
  `keywords` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_page_page_slug_lang` (`slug`,`lang`),
  KEY `ix_page_page_status` (`status`),
  KEY `ix_page_page_is_protected` (`is_protected`),
  KEY `ix_page_page_user_id` (`user_id`),
  KEY `ix_page_page_change_user_id` (`change_user_id`),
  KEY `ix_page_page_menu_order` (`order`),
  KEY `ix_page_page_category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `category_id`, `lang`, `parent_id`, `creation_date`, `change_date`, `user_id`, `change_user_id`, `title_short`, `title`, `slug`, `body`, `keywords`, `description`, `status`, `is_protected`, `order`) VALUES
(1, NULL, 'en', NULL, '2014-01-12 16:08:58', '2014-01-12 16:09:15', 1, 1, 'Home page', 'Home page', 'home', '<p>\r\n	 Home page\r\n</p>', '', '', 1, 0, 0),
(2, NULL, 'ru', NULL, '2014-01-12 16:09:53', '2014-01-19 17:38:21', 1, 1, 'Домашняя страница', 'Домашняя страница', 'home', '<p>\r\n	   Домашняя страница\r\n</p>\r\n<p>\r\n	<img src="/public/uploads/19012014/0b29203a1c78b896b61bc1f457b1062f.jpg">\r\n</p>', '', '', 1, 0, 0),
(3, NULL, 'uk', NULL, '2014-01-12 16:11:03', '2014-01-12 16:11:03', 1, 1, 'Домашня сторiнка', 'Домашня сторiнка', 'home', '<p>\r\n	Домашня сторiнка\r\n</p>', '', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `change_date` datetime NOT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `middle_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `nick_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `birth_date` date DEFAULT NULL,
  `site` varchar(250) NOT NULL DEFAULT '',
  `about` varchar(250) NOT NULL DEFAULT '',
  `location` varchar(250) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '2',
  `access_level` int(11) NOT NULL DEFAULT '0',
  `last_visit` datetime DEFAULT NULL,
  `registration_date` datetime NOT NULL,
  `avatar` varchar(150) DEFAULT NULL,
  `hash` varchar(255) NOT NULL DEFAULT '0f394eda953a976708fa16a20a940b7e0.38727900 1389535505',
  `email_confirm` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_user_user_nick_name` (`nick_name`),
  UNIQUE KEY `ux_user_user_email` (`email`),
  KEY `ix_user_user_status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `change_date`, `first_name`, `middle_name`, `last_name`, `nick_name`, `email`, `gender`, `birth_date`, `site`, `about`, `location`, `status`, `access_level`, `last_visit`, `registration_date`, `avatar`, `hash`, `email_confirm`, `role`) VALUES
(1, '2014-01-12 16:06:17', '', '', '', 'admin_oleg', 'admin@admin.com', 0, NULL, '', '', '', 1, 1, '2014-01-28 21:37:15', '2014-01-12 16:06:17', NULL, '$2a$13$DIIauSl.21ZTFJZ9jkmlau23olp8J.qga1vmzpkThJJ.LcR4sWg6C', 1, 'user'),
(2, '2014-01-19 17:26:09', '', '', '', 'petro', 'petro@petro.com', 0, NULL, '', '', '', 1, 0, '2014-01-19 00:30:20', '2014-01-19 00:26:42', NULL, '$2a$13$UJivCf3DaUZsZ/VoOoq8Qu414Kac5jzJkYRQnNIOufsHJy2Tb2YAS', 0, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `user_tokens`
--

CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ix_user_tokens_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `user_tokens`
--

INSERT INTO `user_tokens` (`id`, `user_id`, `token`, `type`, `status`, `created`, `updated`, `ip`) VALUES
(1, 2, '7746e0e9a59cc487f158876ac72bd5fa7c10ff86', 1, 0, '2014-01-19 00:26:42', '2014-01-19 00:26:42', '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `yupe_category_category`
--

CREATE TABLE IF NOT EXISTS `yupe_category_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(150) NOT NULL,
  `lang` char(2) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `short_description` text,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `level` int(11) DEFAULT '0',
  `root` int(11) DEFAULT '0',
  `lft` int(11) DEFAULT '0',
  `rgt` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_yupe_category_category_alias_lang` (`alias`,`lang`),
  KEY `ix_yupe_category_category_status` (`status`),
  KEY `ix_yupe_category_category_level` (`level`),
  KEY `ix_yupe_category_category_root` (`root`),
  KEY `ix_yupe_category_category_lft` (`lft`),
  KEY `ix_yupe_category_category_rgt` (`rgt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `yupe_settings`
--

CREATE TABLE IF NOT EXISTS `yupe_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` varchar(100) NOT NULL,
  `param_name` varchar(100) NOT NULL,
  `param_value` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL,
  `change_date` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_yupe_settings_module_id_param_name_user_id` (`module_id`,`param_name`,`user_id`),
  KEY `ix_yupe_settings_module_id` (`module_id`),
  KEY `ix_yupe_settings_param_name` (`param_name`),
  KEY `fk_yupe_settings_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `yupe_settings`
--

INSERT INTO `yupe_settings` (`id`, `module_id`, `param_name`, `param_value`, `creation_date`, `change_date`, `user_id`, `type`) VALUES
(1, 'yupe', 'siteDescription', ' сайт на Yii!', '2014-01-12 16:06:43', '2014-01-12 16:06:43', 1, 1),
(2, 'yupe', 'siteName', 'Yii', '2014-01-12 16:06:43', '2014-01-12 16:06:43', 1, 1),
(3, 'yupe', 'siteKeyWords', 'yii', '2014-01-12 16:06:43', '2014-01-12 16:06:43', 1, 1),
(4, 'yupe', 'email', 'admin@admin.com', '2014-01-12 16:06:43', '2014-01-12 16:06:43', 1, 1),
(5, 'yupe', 'theme', 'default', '2014-01-12 16:06:43', '2014-01-12 16:06:43', 1, 1),
(6, 'yupe', 'backendTheme', '', '2014-01-12 16:06:43', '2014-01-12 16:06:43', 1, 1),
(7, 'yupe', 'coreCacheTime', '3600', '2014-01-12 16:07:33', '2014-01-12 16:07:33', 1, 1),
(8, 'yupe', 'editorsDir', 'application.modules.yupe.widgets.editors', '2014-01-12 16:07:33', '2014-01-12 16:07:33', 1, 1),
(9, 'yupe', 'uploadPath', 'uploads', '2014-01-12 16:07:33', '2014-01-12 16:07:33', 1, 1),
(10, 'yupe', 'editor', 'application.modules.yupe.widgets.editors.imperaviRedactor.ImperaviRedactorWidget', '2014-01-12 16:07:34', '2014-01-12 16:07:34', 1, 1),
(11, 'yupe', 'availableLanguages', 'ru,en,uk', '2014-01-12 16:07:34', '2014-01-12 16:07:34', 1, 1),
(12, 'yupe', 'defaultLanguage', 'ru', '2014-01-12 16:07:34', '2014-01-12 16:07:34', 1, 1),
(13, 'yupe', 'defaultBackendLanguage', 'ru', '2014-01-12 16:07:34', '2014-01-12 16:07:34', 1, 1),
(14, 'homepage', 'mode', '2', '2014-01-19 14:09:59', '2014-01-19 14:09:59', 1, 1),
(15, 'homepage', 'limit', '5', '2014-01-19 14:09:59', '2014-01-19 14:09:59', 1, 1),
(16, 'homepage', 'target', '2', '2014-01-19 14:09:59', '2014-01-19 14:37:17', 1, 1);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_feedback_answer_user` FOREIGN KEY (`answer_user`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_feedback_feedback_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `menu_item`
--
ALTER TABLE `menu_item`
  ADD CONSTRAINT `fk_menu_menu_item_menu_id` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_news_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_news_news_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `fk_page_page_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_page_page_change_user_id` FOREIGN KEY (`change_user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_page_page_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `fk_user_tokens_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `yupe_settings`
--
ALTER TABLE `yupe_settings`
  ADD CONSTRAINT `fk_yupe_settings_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;
