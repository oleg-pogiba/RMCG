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
	<?php echo CHtml::link(
		'Личный кабинет',
		array(
			'/user/account/profile/',
		)
	); ?>


</div>
<div id="outer">
	<div id="header">
		<?php echo CHtml::link(
			CHtml::image(
				Yii::app()->getAssetManager()->publish(
					Yii::app()->theme->basePath) . '/web/images/logo.png',
				Yii::t('zii', 'Home'),
				array('title' => Yii::t('zii', 'Home'))
			), array(
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
			</div>
		</div>
		<div id="secondaryContent">
			<div style="color:#AF0A0A;"><a href="#"><strong>Новости:</strong></a></div>
			<br/>

			<h3>30.12.2013</h3>

			<p>Наказ МОЗ України "Про державну реєстрацію (перереєстрацію) лікарських засобів та внесення змін у
				реєстраційні матеріали" від 27 грудня 2013р №1153<a href="#"><br/>Далее&#8230;</a></p>

			<h3>27.11.2013</h3>

			<p>Перелік лікарських засобів, на які передано до МОЗ висновки щодо ефективності, безпечності та якості
				лікарських засобів, що пропонуються до державної реєстрації (перереєстрації), внесення змін до
				реєстраційних матеріалів.<a href="#"><br/>Далее&#8230;</a></p>

			<h3>28.10.2013</h3>

			<p>Наказ МОЗ України "Про державну реєстрацію (перереєстрацію) лікарських засобів та внесення змін у
				реєстраційні матеріали" від 28 жовтня 2013р №916<a href="#"><br/>Далее&#8230;</a></p>
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
