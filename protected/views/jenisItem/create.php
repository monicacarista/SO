<?php
/* @var $this JenisItemController */
/* @var $model JenisItem */

$this->breadcrumbs=array(
	'Jenis Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JenisItem', 'url'=>array('index')),
	array('label'=>'Manage JenisItem', 'url'=>array('admin')),
);
?>

<h1>Create JenisItem</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>