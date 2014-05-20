<?php
$this->pageTitle = $page->title;
$this->breadcrumbs = array(
	Yii::t('HomepageModule.homepage', 'Pages'),
	$page->title
);
$this->description = !empty($page->description) ? $page->description : $this->description;
$this->keywords = !empty($page->keywords) ? $page->keywords : $this->keywords
?>
<!-- Slider -->
<div id="banner">
	<div id="wowslider-container">
		<div class="ws_images">
			<ul>
				<li>
					<?php echo CHtml::image(
						Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/slider/02.jpg',
						'01',
						array(
							'id' => 'wows2_0'
						)
					);?>
				</li>
				<li>
					<?php echo CHtml::image(
						Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/slider/03.jpg',
						'02',
						array(
							'id' => 'wows2_1'
						)
					);?>
				</li>
				<li>
					<?php echo CHtml::image(
						Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/slider/04.jpg',
						'03',
						array(
							'id' => 'wows2_2'
						)
					);?>
				</li>
				<li>
					<?php echo CHtml::image(
						Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/slider/05.jpg',
						'04',
						array(
							'id' => 'wows2_3'
						)
					);?>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- end Slider -->

<!-- #services -->
<div id="services">
	<div>
		<div id="column1">
			<div class="servtext"><?php echo Yii::t('PageModule.page','REGISTRATION'); ?></div>
			<p>
				<?php echo CHtml::link(
						CHtml::image(Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/srvs/reg.png'),
						array(
							'/pages/registration/',
						)
					);
				?>
			</p>
		</div>
		<div id="column2">
			<div class="servtext"><?php echo Yii::t('PageModule.page','SERTIFICATION'); ?></div>
			<p>
				<?php echo CHtml::link(
					CHtml::image(Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/srvs/sert.png'),
					array(
						'/pages/sertification/',
					)
				);
				?>
			</p>
		</div>
		<div id="column3">
			<div class="servtext"><?php echo Yii::t('PageModule.page','AUTHORIZATION'); ?></div>
			<p>
				<?php echo CHtml::link(
					CHtml::image(Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/srvs/login.png'),
					array(
						'/user/account/login/',
					)
				);
				?>
			</p>
		</div>
		<div id="column4">
			<div class="servtext"><?php echo Yii::t('PageModule.page','MARKETING'); ?></div>
			<p>
				<?php echo CHtml::link(
					CHtml::image(Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/srvs/mark.png'),
					array(
						'/pages/marketing/',
					)
				);
				?>
			</p>
		</div>
		<div id="column5">
			<div class="servtext"><?php echo Yii::t('PageModule.page','PHARMACOVIGILANCE'); ?></div>
			<p>
				<?php echo CHtml::link(
					CHtml::image(Yii::app()->getAssetManager()->publish(Yii::app()->theme->basePath) . '/web/images/srvs/farm.png'),
					array(
						'/pages/pharmacovigilance/',
					)
				);
				?>
			</p>
		</div>
	</div>
</div>

<!-- #services -->

<?php echo $page->body; ?>
