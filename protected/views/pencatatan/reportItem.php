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
		


		
        </div>
		
        <!-- /.card-header -->
        <div class="card-body">
			
			
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pencatatan-grid',
	'dataProvider'=>$dataProvider2,
'columns'=>array(
   
      
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
		

		
	),
)); ?>

        </div>
        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->  

