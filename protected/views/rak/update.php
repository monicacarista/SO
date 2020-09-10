<?php
/* @var $this RakController */
/* @var $model Rak */

$this->breadcrumbs=array(
	'Raks'=>array('index'),
	$model->id_rak=>array('view','id'=>$model->id_rak),
	'Update',
);

$this->menu=array(
	array('label'=>'List Rak', 'url'=>array('index')),
	array('label'=>'Create Rak', 'url'=>array('create')),
	array('label'=>'View Rak', 'url'=>array('view', 'id'=>$model->id_rak)),
	array('label'=>'Manage Rak', 'url'=>array('admin')),
);
?>

<h1>Update Rak <?php echo $model->id_rak; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>