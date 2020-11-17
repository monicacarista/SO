<?php
/* @var $this DtlJadwalController */
/* @var $model DtlJadwal */

$this->breadcrumbs=array(
	'Dtl Jadwals'=>array('index'),
	$model->id_dtl_jadwal,
);

$this->menu=array(
	array('label'=>'List DtlJadwal', 'url'=>array('index')),
	array('label'=>'Create DtlJadwal', 'url'=>array('create')),
	array('label'=>'Update DtlJadwal', 'url'=>array('update', 'id'=>$model->id_dtl_jadwal)),
	array('label'=>'Delete DtlJadwal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_dtl_jadwal),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DtlJadwal', 'url'=>array('admin')),
);
?>

<h1>View DtlJadwal #<?php echo $model->id_dtl_jadwal; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_dtl_jadwal',
		'id',
		'id_jadwal',
		'id_item',
	),
)); ?>
