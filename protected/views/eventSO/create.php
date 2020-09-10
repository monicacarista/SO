<?php
/* @var $this EventSOController */
/* @var $model EventSO */

$this->breadcrumbs=array(
	'Event Sos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EventSO', 'url'=>array('index')),
	array('label'=>'Manage EventSO', 'url'=>array('admin')),
);
?>

<h1>Daftar Event Stock Opname</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>