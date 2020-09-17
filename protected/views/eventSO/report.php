<?php
/* @var $this EventSOController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Event Sos',
);

$this->menu=array(
	array('label'=>'Create EventSO', 'url'=>array('create')),
	array('label'=>'Manage EventSO', 'url'=>array('admin')),
);
?>

<h1> Report Stock Opname</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'event-so-grid',
	'dataProvider'=>$dataProvider1,
'columns'=>array(
    array(
        'name'=>'ID SO',
        'type'=>'raw',
        'value'=>'$data["id_so"]',
         ),
		array(
			'name'=>'ID Item ',
			'type'=>'raw',
			'value'=>'$data["id_item"]',
        ),
      
		array(
			'name'=>'Nama Item ',
			'type'=>'raw',
			'value'=>'$data["nama_item"]',
		),
		array(
			'name'=>'Jumlah Stok',
			'type'=>'raw',
			'value'=>'$data["jml_stok"]',
		),
		array(
			'name'=>'Jumlah Stok Tempat',
			'type'=>'raw',
			'value'=>'$data["jml_stok_tem"]',
		),
		

		array(
			'name'=>'Harga Per Item',
			'type'=>'raw',
			'value'=>'$data["harga"]',
		),
		
		
		array(
			'name'=>'Selisih Total Item',
			'type'=>'raw',
			'value'=>'$data["ttl_selisih_item"]',
		),
		array(
			'name'=>'Selisih Total Harga',
			'type'=>'raw',
			'value'=>'$data["selisih_harga"]',
		),


		// 'id_so',
		// 'id_apotek',
		// array(
		// 	'name'=>'id_apotek',
		// 	'header'=>'Nama Apotek',
		// 	'value'=>'$this->grid->getController()->getIdApotek($data->id_apotek)'
		// ),
		// 'tgl_mulai',
		// 'tgl_berakhir',
		// 'total_selisih',
		
		
	),
)); ?>
<?php echo CHtml::beginForm(array('EventSO/report1')); ?>

<?php echo CHtml::submitButton('Export to .csv'); ?>
