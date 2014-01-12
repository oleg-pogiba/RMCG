<?php
/**
 * YBackAccessControl фильтр, контроллирующий доступ в панель управления
 *
 * @package yupe.modules.user.filters
 * @since 0.1
 *
 */
namespace yupe\filters;

use CAccessControlFilter;
use Yii;

class YBackAccessControl extends CAccessControlFilter
{
    public function preFilter($filterChain)
    {
        if (Yii::app()->user->isSuperUser()) {
            return true;
        }
        elseif (Yii::app()->user->isGuest) {
            Yii::app()->getRequest()->redirect(
                Yii::app()->createAbsoluteUrl('/user/account/backendlogin')
            );
        }

        $this->accessDenied(Yii::app()->user, Yii::t('yii', 'You are not authorized to perform this action.'));
    }
}