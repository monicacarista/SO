

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
		
	),
)); ?>

