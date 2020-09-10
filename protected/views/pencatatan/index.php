<?php
/* @var $this PencatatanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pencatatans',
);

$this->menu=array(
	array('label'=>'Create Pencatatan', 'url'=>array('create')),
	array('label'=>'Manage Pencatatan', 'url'=>array('admin')),
);
?>

<h1>Pencatatans</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pencatatan-grid',
	'dataProvider'=>$dataProvider,
	
	'columns'=>array(
		'id_pencatatan',
		array(
			'name'=>'id_so',
			'header'=>'ID SO',
			'value'=>'$this->grid->getController()->getIdSO($data->id_so)'
		),
		'id_jadwal',
	
		//'id_item',
		array(
			'name'=>'id_item',
			'header'=>'Nama Item',
			'value'=>'$this->grid->getController()->getIdItem($data->id_item)'
		),
		'stok_tempat',
		
		
		array(
			'name'=>'id_dtl_item',
			'header'=>'Batch',
			'value'=>'$this->grid->getController()->getBatch($data->id_dtl_item)'
		),
		
	),
)); ?>
