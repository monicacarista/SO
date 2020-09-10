<?php
/* @var $this RakController */
/* @var $model Rak */

$this->breadcrumbs=array(
	'Raks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Rak', 'url'=>array('index')),
	array('label'=>'Manage Rak', 'url'=>array('admin')),
);
?>

<h1>Create Rak</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>