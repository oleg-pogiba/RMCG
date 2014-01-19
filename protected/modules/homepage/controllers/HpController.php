<?php

/**
 * HpController контроллер публичной части модуля homepage
 *
 * @category YupeController
 * @package  yupe.modules.homepage.controllers
 * @author   YupeTeam <team@yupe.ru>
 * @license  BSD http://ru.wikipedia.org/wiki/%D0%9B%D0%B8%D1%86%D0%B5%D0%BD%D0%B7%D0%B8%D1%8F_BSD
 * @link     http://yupe.ru
 *
 **/
class HpController extends yupe\components\controllers\FrontController
{

	/**
	 * Index action:
	 *
	 * @return void
	 */
	public function actionIndex()
	{
		$module = Yii::app()->getModule('homepage');

		$view = $data = null;

		if ($module->mode == HomepageModule::MODE_PAGE) {
			$view = 'page';

			//{ author="Pogiba" date="2014-01-19" desc="homepage"
			$slug = Page::model()->findByPk($module->target)->getAttribute('slug');

			$page = Page::model()->find('slug = :slug AND (lang=:lang OR (lang IS NULL))', array(
				':slug' => $slug,
				':lang' => Yii::app()->language,
			));
			if (!$page) {
				$page = Page::model()->find('slug = :slug AND (lang=:lang OR (lang IS NULL))', array(
					':slug' => $slug,
					':lang' => Yii::app()->getModule('yupe')->defaultLanguage,
				));
			}
			//}
			if (!$page) {
				throw new CHttpException('404', Yii::t('PageModule.page', 'Page was not found'));
			}

			$data = array(
				//{ author="Pogiba" date="2014-01-19" desc="homepage"
				//'page' => Page::model()->findByPk($module->target)
				'page' => $page,
				//}
			);
		}

		if ($module->mode == HomepageModule::MODE_POSTS) {
			$view = 'posts';

			$dataProvider = new CActiveDataProvider(
				'Post', array(
					'criteria' => new CDbCriteria(
							array(
								'condition' => 't.status = :status',
								'params' => array(':status' => Post::STATUS_PUBLISHED),
								'limit' => $module->limit,
								'order' => 't.id DESC',
								'with' => array('createUser', 'blog', 'commentsCount'),
							)
						),
				)
			);

			$data = array(
				'dataProvider' => $dataProvider
			);
		}

		$this->render($view, $data);
	}
}