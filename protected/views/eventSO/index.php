<?php
/* @var $this EventSOController */
/* @var $model EventSO */

$this->breadcrumbs=array(
	'Event Sos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EventSO', 'url'=>array('index')),
	array('label'=>'Create EventSO', 'url'=>array('create')),
);

?>

<h1>Manage Event Sos</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'event-so-grid',
	'dataProvider'=>$dataProvider,

	'columns'=>array(
		'id_so',
		array(
			'name'=>'id_apoteker',
			'header'=>'Nama Apoteker',
			'value'=>'$this->grid->getController()->getIdApoteker($data->id_apoteker)'
		),
		'tgl_mulai',
		'tgl_berakhir',
		/*
		'total_selisih_item',
		*/
	
	),
)); ?>
