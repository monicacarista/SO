<?php
/* @var $this JadwalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'List Jadwal Pencatatan',
);

?>

<h1>List Jadwal Pencatatan</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pencatatan-grid',
	'dataProvider'=>$dataProvider,
	
	'columns'=>array(
		array(
			'name'=>'id_apoteker',
			'header'=>'Nama Apoteker',
			'value'=>'$this->grid->getController()->getIdApoteker($data->id_apoteker)'
		),
		'jadwal_pengecekan',
		
	),
)); ?>
