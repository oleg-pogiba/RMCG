<!DOCTYPE html>
<html lang="<?php echo Yii::app()->language; ?>">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1">
	<meta charset="<?php echo Yii::app()->charset; ?>"/>
	<meta name="keywords" content="<?php echo $this->keywords; ?>"/>
	<meta name="description" content="<?php echo $this->description; ?>"/>
	<meta property="og:title" content="<?php echo CHtml::encode($this->pageTitle); ?>"/>
	<meta property="og:description" content="<?php echo $this->description; ?>"/>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700&subset=latin,cyrillic'
		  rel='stylesheet' type='text/css'>
</head>

<body>
<div id="flags">
	<div id="flags_pos">
		<?php
		$this->widget('zii.widgets.CMenu',
			array(
				'encodeLabel' => false,
				'items' => $this->yupe->getLanguageSelectorArrayFrontend(),
				'htmlOptions' => array(
					'id' => 'fl_list'
				),
			)
		);
		?>
	</div>
</div>
<div id="cabinet">
	<?php if (Yii::app()->user->isAuthenticated()): ?>
	<?php echo CHtml::link(
		Yii::t('UserModule.user', 'Logout'),
		array('/user/account/logout',)
	); ?>
	<?php else: ?>
	<?php echo CHtml::link(
		Yii::t('UserModule.user', 'Login'),
		array('/user/account/login',)
	); ?>
	<?php endif; ?>
</div>
<div id="outer">
	<div id="header">
		<?php echo CHtml::link(
			CHtml::image(
				Yii::app()->getAssetManager()->publish(
					Yii::app()->theme->basePath) . '/web/images/logo.png',
				Yii::t('zii', 'Home'),
				array('title' => Yii::t('zii', 'Home'))
			),
			array(
				'/' . Yii::app()->defaultController . '/index',
			)
		); ?>
	</div>
	<div id="menu">
		<?php $this->widget('application.modules.menu.widgets.MenuWidget', array('name' => 'top-menu')); ?>
	</div>
	<div id="content">
		<div id="primaryContentContainer">
			<div id="primaryContent">
				<!-- flashMessages -->
				<?php $this->widget('YFlashMessages'); ?>

				<!-- content -->
				<?php echo $content; ?>
				<!-- content end-->
				<div id="partners"><h3>Наши партнеры:</h3>
					<?php echo CHtml::image(Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/pharma.jpg');?>
					<?php echo CHtml::image(Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/recordati.jpg');?>
					<?php echo CHtml::image(Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/fmc.jpg');?>
					<?php echo CHtml::image(Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/microlabs.png');?>
					<?php echo CHtml::image(Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/umc.gif');?>
				</div>
				<div id="clients"><h3>Наши клиенты:</h3>
					<?php echo CHtml::image(Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/pharma.jpg');?>
					<?php echo CHtml::image(Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/recordati.jpg');?>
					<?php echo CHtml::image(Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/fmc.jpg');?>
					<?php echo CHtml::image(Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/microlabs.png');?>
					<?php echo CHtml::image(Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/umc.gif');?>
				</div>
			</div>
		</div>
		<div id="secondaryContent">
			<div class="widget last-posts-widget">
				<?php $this->widget(
					'application.modules.news.widgets.LastNewsWidget',
					array('cacheTime' => $this->yupe->coreCacheTime)
				); ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div id="footer">
		<!-- footer -->
		<?php
		$this->widget("application.modules.contentblock.widgets.ContentBlockWidget", array("code" => "footer"));
		?>
		<?php $this->renderPartial('//layouts/_footer'); ?>
		<!-- footer end -->
	</div>
</div>
</body>
</html>
