<?php
/**
 * Файл отображения для account/backendlogin:
 *
 * @category YupeView
 * @package  yupe
 *
 **/

$this->layout = 'login';
$this->yupe->getComponent('bootstrap');
$this->pageTitle = Yii::t('UserModule.user', 'Authorization');
/**
 * Добавляем нужный CSS:
 */
Yii::app()->clientScript->registerCssFile(
    Yii::app()->assetManager->publish(
        Yii::getPathOfAlias('application.modules.user.views.assets') . '/css/backendlogin.css'
    )
); ?>
<div class="wrapper">
    <div class="login-form">
            <?php
            $form = $this->beginWidget(
                'bootstrap.widgets.TbActiveForm', array(
                    'id'          => 'horizontalForm',
                    'htmlOptions' => array('class' => 'well')
                )
            ); ?>
            <fieldset>
                <legend><?php echo Yii::t('UserModule.user', 'Authorize please'); ?></legend>
                <?php echo $form->errorSummary($model); ?>
                <div class='row-fluid'>
                    <?php echo $form->textFieldRow($model, 'email', array('class' => 'span12')); ?>
                    <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span12')); ?>
                    <?php if($this->getModule()->sessionLifeTime > 0):  ?>
                        <?php echo $form->checkBoxRow($model, 'remember_me'); ?>
                    <?php endif; ?>

                    <?php if(!$this->getModule()->recoveryDisabled):?>
                       <?php echo CHtml::link(Yii::t('UserModule.user', 'Forgot password?'), array('/user/account/recovery')); ?>
                    <?php endif;?>
                </div>
                <?php if (Yii::app()->user->getState('badLoginCount', 0) >= 3): ?>
                    <div class='row-fluid'>
                        <?php if (CCaptcha::checkRequirements('gd')): ?>
                            <?php echo $form->labelEx($model, 'verifyCode'); ?>
                            <div>
                                <?php $this->widget('CCaptcha', array('showRefreshButton' => true)); ?>
                                <?php echo $form->textField($model, 'verifyCode'); ?>
                                <?php echo $form->error($model, 'verifyCode'); ?>
                            </div>
                            <div class="hint">
                                <?php echo Yii::t('UserModule.user', 'Please enter the text from the image'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </fieldset>
            <div class="form-actions">
                <?php
                $this->widget(
                    'bootstrap.widgets.TbButton', array(
                        'buttonType'  => 'submit',
                        'type'        => 'primary',
                        'label'       => Yii::t('UserModule.user', 'Login'),
                        'htmlOptions' => array(
                            'class' => 'btn-block'
                        ),
                    )
                );
                ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>