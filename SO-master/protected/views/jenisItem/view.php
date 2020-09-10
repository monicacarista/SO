<?php
/* @var $this JenisItemController */
/* @var $model JenisItem */

$this->breadcrumbs=array(
	'Jenis Items'=>array('index'),
	$model->id_jenis_item,
);

$this->menu=array(
	array('label'=>'List JenisItem', 'url'=>array('index')),
	array('label'=>'Create JenisItem', 'url'=>array('create')),
	array('label'=>'Update JenisItem', 'url'=>array('update', 'id'=>$model->id_jenis_item)),
	array('label'=>'Delete JenisItem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_jenis_item),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JenisItem', 'url'=>array('admin')),
);
?>

<h1>View JenisItem #<?php echo $model->id_jenis_item; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_jenis_item',
		'nama_jenis_item',
	),
)); ?>
