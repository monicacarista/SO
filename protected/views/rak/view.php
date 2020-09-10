<?php
/* @var $this RakController */
/* @var $model Rak */

$this->breadcrumbs=array(
	'Raks'=>array('index'),
	$model->id_rak,
);

$this->menu=array(
	array('label'=>'List Rak', 'url'=>array('index')),
	array('label'=>'Create Rak', 'url'=>array('create')),
	array('label'=>'Update Rak', 'url'=>array('update', 'id'=>$model->id_rak)),
	array('label'=>'Delete Rak', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_rak),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Rak', 'url'=>array('admin')),
);
?>

<h1>View Rak #<?php echo $model->id_rak; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_rak',
		'lokasi_rak',
		'id_item',
	),
)); ?>
