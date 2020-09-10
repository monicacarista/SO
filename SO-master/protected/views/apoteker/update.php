<?php
/* @var $this ApotekerController */
/* @var $model Apoteker */

$this->breadcrumbs=array(
	'Apotekers'=>array('index'),
	$model->id_apoteker=>array('view','id'=>$model->id_apoteker),
	'Update',
);

$this->menu=array(
	array('label'=>'List Apoteker', 'url'=>array('index')),
	array('label'=>'Create Apoteker', 'url'=>array('create')),
	array('label'=>'View Apoteker', 'url'=>array('view', 'id'=>$model->id_apoteker)),
	array('label'=>'Manage Apoteker', 'url'=>array('admin')),
);
?>

<h1>Update Apoteker <?php echo $model->id_apoteker; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>