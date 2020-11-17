<?php
/* @var $this DtlJadwalController */
/* @var $model DtlJadwal */

$this->breadcrumbs=array(
	'Dtl Jadwals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DtlJadwal', 'url'=>array('index')),
	array('label'=>'Manage DtlJadwal', 'url'=>array('admin')),
);
?>

<h1>Create DtlJadwal</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>