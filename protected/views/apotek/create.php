<?php
/* @var $this ApotekController */
/* @var $model Apotek */

$this->breadcrumbs=array(
	'Apoteks'=>array('index'),
	'Create',
);



if (Yii::app()->user->isAdmin()) {

	//tampilin menu admin
	
	
$this->menu=array(
	array('label'=>'List Apotek', 'url'=>array('index')),
	array('label'=>'Manage Apotek', 'url'=>array('admin')),
);
	} else {
	
	//tampilin menu user biasa
	$this->menu=array(
		array('label'=>'List Apotek', 'url'=>array('index')),
	);
	}


?>

<h1>Create Apotek</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>