<?php
/* @var $this ItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Items',
);

$this->menu=array(
	array('label'=>'Create Item', 'url'=>array('create')),
	array('label'=>'Manage Item', 'url'=>array('admin')),
	array('label'=>'Detail Item', 'url'=>array('dtlItem/create')),
);
?>

<h1>Master Item</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'item-grid',
	'dataProvider'=>$dataProvider,
	
	'columns'=>array(
		'id_item',
		'nama_item',
		'satuan',
		'lokasi_rak',
	),

)); ?>
	