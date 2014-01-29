<?php
/* @var $page Page */
/* @var $this PageController */

$this->pageTitle = $page->title;
$this->breadcrumbs = $this->getBreadCrumbs();
$this->description = $page->description ? : $this->description;
$this->keywords = $page->keywords ? : $this->keywords
?>

<h2><?php echo $page->title; ?></h2>

<p><?php echo $page->body; ?></p>