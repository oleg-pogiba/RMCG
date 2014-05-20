<div id="logo">
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

<div id="prsntn">
	<div class="text">
		<?php $this->widget(
			"application.modules.contentblock.widgets.ContentBlockWidget",
			array(
				"code" => "download-presentation",
				"silent" => true
			)
		); ?>
	</div>
</div>
<?php $this->widget(
	"application.modules.contentblock.widgets.ContentBlockWidget",
	array(
		"code" => "header",
		"silent" => true
	)
); ?>