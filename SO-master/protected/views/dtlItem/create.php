<?php
/* @var $this DtlItemController */
/* @var $model DtlItem */

$this->breadcrumbs=array(
	'Dtl Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DtlItem', 'url'=>array('index')),
	array('label'=>'Manage DtlItem', 'url'=>array('admin')),
);
?>

<h1>Tambahkan Detail Item</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>