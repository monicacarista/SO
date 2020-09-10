<?php
/* @var $this PencatatanController */
/* @var $model Pencatatan */

$this->breadcrumbs=array(
	'Pencatatans'=>array('index'),
	$model->id_pencatatan,
);

$this->menu=array(
	array('label'=>'List Pencatatan', 'url'=>array('index')),
	array('label'=>'Create Pencatatan', 'url'=>array('create')),
	array('label'=>'Update Pencatatan', 'url'=>array('update', 'id'=>$model->id_pencatatan)),
	array('label'=>'Delete Pencatatan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pencatatan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pencatatan', 'url'=>array('admin')),
);
?>

<h1>View Pencatatan #<?php echo $model->id_pencatatan; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_pencatatan',
		'id_so',
		'id_jadwal',
		'id_apotek',
		'id_item',
		'stok_tempat',
		'id_dtl_item',
	),
)); ?>
