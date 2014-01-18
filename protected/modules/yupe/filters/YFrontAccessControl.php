<?php
/**
 * YFrontAccessControl фильтр, контроллирующий доступ к публичной части сайта
 *
 * @package yupe.modules.user.filters
 * @since 0.1
 *
 */
namespace yupe\filters;

use CAccessControlFilter;
use Yii;

class YFrontAccessControl extends CAccessControlFilter
{
	public function preFilter($filterChain)
	{
		//{ author="Pogiba" date="2014-01-19" desc="RBAC"
		//todo: заменить на RBAC
		//}
		if (Yii::app()->user->isAuthenticated()) {
			return true;
		}

		$this->accessDenied(Yii::app()->user, Yii::t('yii', 'You are not authorized to perform this action.'));
	}
}