<?php
/* @var $page Page */
/* @var $this PageController */

$this->pageTitle   = $page->title;
$this->breadcrumbs = $this->getBreadCrumbs();
$this->description = $page->description ?: $this->description;
$this->keywords    = $page->keywords ?: $this->keywords
?>

	<div class="sidemenu">
		<?php $this->widget('application.modules.menu.widgets.MenuWidget', array('name' => 'right-menu')); ?>
	</div>
	<div class="cnt">
		<!--<blockquote><?php echo $page->title; ?></blockquote>-->
		<?php echo $page->body; ?>
	</div>
