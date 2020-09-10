<?php
/* @var $this ApotekerController */
/* @var $model Apoteker */

$this->breadcrumbs=array(
	'Apotekers'=>array('index'),
	$model->id_apoteker,
);

$this->menu=array(
	array('label'=>'List Apoteker', 'url'=>array('index')),
	array('label'=>'Create Apoteker', 'url'=>array('create')),
	array('label'=>'Update Apoteker', 'url'=>array('update', 'id'=>$model->id_apoteker)),
	array('label'=>'Delete Apoteker', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_apoteker),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Apoteker', 'url'=>array('admin')),
);
?>

<h1>View Apoteker #<?php echo $model->id_apoteker; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_apoteker',
		'nama_apoteker',
		'alamat_apoteker',
		'no_telp_apoteker',
	),
)); ?>
