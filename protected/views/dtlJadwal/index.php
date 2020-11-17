<?php
/* @var $this DtlJadwalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dtl Jadwals',
);

$this->menu=array(
	array('label'=>'Create DtlJadwal', 'url'=>array('create')),
	array('label'=>'Manage DtlJadwal', 'url'=>array('admin')),
);
?>

<h1>Dtl Jadwals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
