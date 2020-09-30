<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'Items'=>array('index'),
	'Create',
);

if (Yii::app()->user->isAdmin()) {

	//tampilin menu admin
	
	
	$this->menu=array(
		array('label'=>'List Item', 'url'=>array('index')),
		array('label'=>'Manage Item', 'url'=>array('admin')),
	);
	} else {
	
	//tampilin menu user biasa
	$this->menu=array(
		array('label'=>'List Item', 'url'=>array('index')),
	);
	}
?>

<h1>Create Item</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>