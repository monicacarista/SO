<?php
/* @var $this EventSOController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Event Sos'=>array('index'),
	'Report Item',
);


?>


<!-- Main content -->
<section class="content">
    <div class="card card-default">
        <div class="card-header">
        <h3 class="card-title">
            <!-- <i class="fas fa-bullhorn"></i> -->
            Report Item Kadarluarsa
        </h3>
		<div class="float-lg-right p-2">
        
            <a href="/SO/pencatatan/PDF3" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Export .pdf</a>
		</div>
		


		
        </div>
		
        <!-- /.card-header -->
        <div class="card-body">
			
			
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pencatatan-grid',
	'dataProvider'=>$dataProvider2,
'columns'=>array(
   
		array('name'=>'no',
		'type'=>'raw',
		'header' => 'No ',		
		'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		'filter' => '',		
		),
		array(
			'name'=>'Batch Number',
			'type'=>'raw',
			'value'=>'$data["batch"]',
		),
		array(
			'name'=>'Nama Item ',
			'type'=>'raw',
			'value'=>'$data["nama_item"]',
		),
		array(
			'name'=>'Tanggal Kadarluarsa',
			'type'=>'raw',
			'value'=>'$data["exp_date"]',
		),
		array(
			'name'=>'Lokasi Rak',
			'type'=>'raw',
			'value'=>'$data["lokasi_rak"]',
		),
		array(
			'name'=>'Stok',
			'type'=>'raw',
			'value'=>'$data["stok"]',
		),
		
		

		
	),
)); ?>

        </div>
        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->  

