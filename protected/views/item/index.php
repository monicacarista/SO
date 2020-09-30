<?php
/* @var $this ItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Items',
);

if (Yii::app()->user->isAdmin()) {

	//tampilin menu admin
	
	
	$this->menu=array(
		array('label'=>'Create Item', 'url'=>array('create')),
		array('label'=>'Manage Item', 'url'=>array('admin')),
		array('label'=>'Create Detail Item', 'url'=>array('dtlItem/create')),
	);
	} else {
	
	//tampilin menu user biasa
	$this->menu=array(
		array('label'=>'Create Item', 'url'=>array('create')),
		array('label'=>'Create Detail Item', 'url'=>array('dtlItem/create')),
	);
	}
?>

<h1>List Item</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'event-so-grid',
	'dataProvider'=>$dataProvider,
	
	'columns'=>array(
		'id_item',
		'kode_item',
		'nama_item',
		'satuan',
		'lokasi_rak',

		
		
	),
)); ?>