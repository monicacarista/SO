<?php
/* @var $this JadwalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'List Jadwal Pencatatan',
);
if (Yii::app()->user->isAdmin()) {

	//tampilin menu admin
	
	
	$this->menu=array(
		array('label'=>'Create Jadwal', 'url'=>array('create')),
		array('label'=>'Manage Jadwal', 'url'=>array('admin')),
	);
	} else {
	
	//tampilin menu user biasa
	
	}
?>




<h1>List Jadwal Stock Opname</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jadwal-grid',
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
