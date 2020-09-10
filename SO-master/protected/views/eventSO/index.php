<?php
/* @var $this EventSOController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Event Sos',
);

$this->menu=array(
	array('label'=>'Create EventSO', 'url'=>array('create')),
	array('label'=>'Manage EventSO', 'url'=>array('admin')),
	array('label'=>'Report', 'url'=>array('report')),

);
?>

<h1>List Event Stock Opname</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'event-so-grid',
	'dataProvider'=>$dataProvider,
	
	'columns'=>array(
		'id_so',
		array(
			'name'=>'id_apotek',
			'header'=>'Nama Apotek',
			'value'=>'$this->grid->getController()->getIdApotek($data->id_apotek)'
		),
		'tgl_mulai',
		'tgl_berakhir',
		'total_selisih',
		
		
	),
)); ?>