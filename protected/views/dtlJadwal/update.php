<?php
/* @var $this DtlJadwalController */
/* @var $model DtlJadwal */

$this->breadcrumbs=array(
	'Dtl Jadwals'=>array('index'),
	$model->id_dtl_jadwal=>array('view','id'=>$model->id_dtl_jadwal),
	'Update',
);

$this->menu=array(
	array('label'=>'List DtlJadwal', 'url'=>array('index')),
	array('label'=>'Create DtlJadwal', 'url'=>array('create')),
	array('label'=>'View DtlJadwal', 'url'=>array('view', 'id'=>$model->id_dtl_jadwal)),
	array('label'=>'Manage DtlJadwal', 'url'=>array('admin')),
);
?>

<h1>Update DtlJadwal <?php echo $model->id_dtl_jadwal; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>