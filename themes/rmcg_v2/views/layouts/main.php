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
	<!-- Links -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,400italic,700,500,900&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<!-- end links -->
	<!-- Scripts -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<!-- end scripts -->
</head>

<body>
<!-- Wrapper -->
<div id="wrapper">
	<!-- Header -->
	<div id="header">
		<?php $this->renderPartial('//layouts/_header'); ?>
	</div>
	<!-- end Header -->

	<!-- Menu -->
	<div id="menu">
		<div id='cssmenu'>
			<?php $this->widget('application.modules.menu.widgets.MenuWidget', array('name' => 'top-menu')); ?>

			<div class="flags">
				<div class="flags_pos">
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
		</div>
	</div>
	<!-- end Menu -->
	<div id="content">
		<!-- flashMessages -->
		<?php $this->widget('YFlashMessages'); ?>
		<!-- content -->
		<?php echo $content; ?>
	</div>
</div>
<!-- end Wrapper -->

<!-- #footer -->
<div id="footer">
	<!-- footer -->
	<?php $this->renderPartial('//layouts/_footer'); ?>
	<!-- footer end -->
</div>
<!-- #footer -->

</body>
</html>