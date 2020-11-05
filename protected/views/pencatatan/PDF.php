

<h1> Report Stock Opname</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'event-so-grid',
	'dataProvider'=>$dataProvider1,
'columns'=>array(
 
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
			'name'=>'Satuan',
			'type'=>'raw',
			'value'=>'$data["satuan"]',
		),

		array(
			'name'=>'Harga Per Item',
			'type'=>'raw',
			//'value'=>'$data["harga"]',
			'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",$data["harga"])',
		),
		
		
		array(
			'name'=>'Selisih Total Item',
			'type'=>'raw',
			'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",$data["ttl_selisih_item"])',
		),
		array(
			'name'=>'Selisih Total Harga',
			'type'=>'raw',
			'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",$data["selisih_harga"])',
		),
		
	),
)); ?>

