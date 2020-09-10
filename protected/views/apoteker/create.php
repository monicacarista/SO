<?php
/* @var $this ApotekerController */
/* @var $model Apoteker */

$this->breadcrumbs=array(
	'Apotekers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Apoteker', 'url'=>array('index')),
	array('label'=>'Manage Apoteker', 'url'=>array('admin')),
);
?>

<h1>Create Apoteker</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>