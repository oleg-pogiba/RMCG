<?php Yii::import('application.modules.news.NewsModule'); ?>

<div style="color:#AF0A0A;">
	<a href="#"><strong><?php echo Yii::t('NewsModule.news', 'News'); ?>:</strong></a>
</div>
<br/>

<?php if (isset($models) && $models != array()): ?>
	<?php foreach ($models as $model): ?>
		<h3><?php echo $model->date; ?></h3>
		<?php echo $model->short_text; ?>
		<?php echo CHtml::link(Yii::t('NewsModule.news', 'Details...'), array('/news/news/show/', 'alias' => $model->alias)); ?>
	<?php endforeach; ?>
<?php endif; ?>

