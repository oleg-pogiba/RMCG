<?php
/**
 * Файл представления menu/view:
 *
 * @category YupeViews
 * @package  yupe
 * @author   YupeTeam <team@yupe.ru>
 * @license  BSD http://ru.wikipedia.org/wiki/%D0%9B%D0%B8%D1%86%D0%B5%D0%BD%D0%B7%D0%B8%D1%8F_BSD
 * @version  0.1
 * @link     http://yupe.ru
 *
 **/
$this->breadcrumbs = array(
	Yii::t('MenuModule.menu', 'Menu') => array('/menu/menuBackend/index'),
	$model->name,
);

$this->pageTitle = Yii::t('MenuModule.menu', 'Menu - show');

$this->menu = array(
	array('label' => Yii::t('MenuModule.menu', 'Menu'), 'items' => array(
		array('icon' => 'plus-sign', 'label' => Yii::t('MenuModule.menu', 'Create menu'), 'url' => array('/menu/menuBackend/create')),
		array('icon' => 'list-alt', 'label' => Yii::t('MenuModule.menu', 'Manage menu'), 'url' => array('/menu/menuBackend/index')),
		array('label' => Yii::t('MenuModule.menu', 'Menu') . ' «' . $model->name . '»'),
		array('icon' => 'pencil', 'label' => Yii::t('MenuModule.menu', 'Change menu'), 'url' => array('/menu/menuBackend/update', 'id' => $model->id)),
		array('icon' => 'eye-open', 'encodeLabel' => false, 'label' => Yii::t('MenuModule.menu', 'View menu'), 'url' => array(
			'/menu/menuBackend/view',
			'id' => $model->id
		)),
		array('icon' => 'trash', 'label' => Yii::t('MenuModule.menu', 'Remove menu'), 'url' => '#', 'linkOptions' => array(
			'submit' => array('/menu/menuBackend/delete', 'id' => $model->id),
			'confirm' => Yii::t('MenuModule.menu', 'Do you really want to delete?')),
		),
	)),
	array('label' => Yii::t('MenuModule.menu', 'Menu items'), 'items' => array(
		array('icon' => 'plus-sign', 'label' => Yii::t('MenuModule.menu', 'Create menu item'), 'url' => array('/menu/menuitemBackend/create')),
		array('icon' => 'list-alt', 'label' => Yii::t('MenuModule.menu', 'Manage menu items'), 'url' => array('/menu/menuitemBackend/index')),
	)),
);
?>
<div class="page-header">
	<h1>
		<?php echo Yii::t('MenuModule.menu', 'Show menu'); ?><br/>
		<small>&laquo;<?php echo $model->name; ?>&raquo;</small>
	</h1>
</div>

<?php $this->widget(
	'bootstrap.widgets.TbDetailView', array(
		'data' => $model,
		'attributes' => array(
			'id',
			'name',
			'code',
			'description',
			array(
				'name' => 'status',
				'value' => $model->getStatus(),
			),
		),
	)
); ?>

<br/>
<div>
	<?php echo Yii::t('MenuModule.menu', 'Use next code for inserting menu in view'); ?>
	<br/><br/>
	<?php echo $example; ?>
</div>
