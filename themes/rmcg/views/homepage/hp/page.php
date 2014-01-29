<?php
$this->pageTitle = $page->title;
//{ author="Pogiba" date="2014-01-19" desc="homepage"
$this->breadcrumbs = array(
	Yii::t('HomepageModule.homepage', 'Pages'),
	$page->title
);
//}

$this->description = !empty($page->description) ? $page->description : $this->description;
$this->keywords = !empty($page->keywords) ? $page->keywords : $this->keywords
?>

<h2><?php echo $page->title; ?></h2>

<p><?php echo $page->body; ?></p>