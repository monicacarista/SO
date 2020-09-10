<?php
/* @var $this ApotekController */
/* @var $model Apotek */

$this->breadcrumbs=array(
	'Apoteks'=>array('index'),
	$model->id_apotek=>array('view','id'=>$model->id_apotek),
	'Update',
);

$this->menu=array(
	array('label'=>'List Apotek', 'url'=>array('index')),
	array('label'=>'Create Apotek', 'url'=>array('create')),
	array('label'=>'View Apotek', 'url'=>array('view', 'id'=>$model->id_apotek)),
	array('label'=>'Manage Apotek', 'url'=>array('admin')),
);
?>

<h1>Update Apotek <?php echo $model->id_apotek; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>