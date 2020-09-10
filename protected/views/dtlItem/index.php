<?php
/* @var $this DtlItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dtl Items',
);

$this->menu=array(
	array('label'=>'Create DtlItem', 'url'=>array('create')),
	array('label'=>'Manage DtlItem', 'url'=>array('admin')),
);
?>

<h1>Dtl Items</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dtlitem-grid',
	'dataProvider'=>$dataProvider,
	
	'columns'=>array(
		'id_dtl_item',
		array(
			'name'=>'id_apotek',
			'header'=>'Nama Apotek',
			'value'=>'$this->grid->getController()->getIdApotek($data->id_apotek)'
		),
		array(
			'name'=>'id_item',
			'header'=>'Nama Item',
			'value'=>'$this->grid->getController()->getIdItem($data->id_item)'
		),
		'batch',
		'stok',
		'exp_date',	
		'harga',
			
		
	),
)); ?>