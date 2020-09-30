<?php
/* @var $this PencatatanController */
/* @var $model Pencatatan */

$this->breadcrumbs=array(
	'Pencatatans'=>array('index'),
	'Create',
);
$this->menu=array(
	array('label'=>'List Pencatatan', 'url'=>array('index')),
	array('label'=>'Manage Pencatatan', 'url'=>array('admin')),
);
?>

<h1>Input Pencatatan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
