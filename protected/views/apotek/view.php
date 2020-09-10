<?php
/* @var $this ApotekController */
/* @var $model Apotek */

$this->breadcrumbs=array(
	'Apoteks'=>array('index'),
	$model->id_apotek,
);

$this->menu=array(
	array('label'=>'List Apotek', 'url'=>array('index')),
	array('label'=>'Create Apotek', 'url'=>array('create')),
	array('label'=>'Update Apotek', 'url'=>array('update', 'id'=>$model->id_apotek)),
	array('label'=>'Delete Apotek', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_apotek),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Apotek', 'url'=>array('admin')),
);
?>

<h1>View Apotek #<?php echo $model->id_apotek; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_apotek',
		'nama_apotek',
		'lokasi_apotek',
	),
)); ?>
