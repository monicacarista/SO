<?php
/* @var $this ApotekController */
/* @var $model Apotek */

$this->breadcrumbs=array(
	'Apoteks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Apotek', 'url'=>array('index')),
	array('label'=>'Manage Apotek', 'url'=>array('admin')),
);
?>

<h1>Create Apotek</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>