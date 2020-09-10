<?php
/* @var $this PencatatanController */
/* @var $model Pencatatan */

$this->breadcrumbs=array(
	'Pencatatans'=>array('index'),
	$model->id_pencatatan=>array('view','id'=>$model->id_pencatatan),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pencatatan', 'url'=>array('index')),
	array('label'=>'Create Pencatatan', 'url'=>array('create')),
	array('label'=>'View Pencatatan', 'url'=>array('view', 'id'=>$model->id_pencatatan)),
	array('label'=>'Manage Pencatatan', 'url'=>array('admin')),
);
?>

<h1>Update Pencatatan <?php echo $model->id_pencatatan; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>