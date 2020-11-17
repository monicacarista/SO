<?php
/* @var $this EventSOController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Event Sos'=>array('index'),
	'Report',
);


?>


<!-- Main content -->
<section class="content">
    <div class="card card-default">
        <div class="card-header">
        <h3 class="card-title">
            <!-- <i class="fas fa-bullhorn"></i> -->
            SO
        </h3>
		
		<?php if (Yii::app()->user->isAdmin()) {

		//tampilin menu admin

		
		echo '<div class="float-lg-right p-2">
            <a href="/SO/pencatatan/report1" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Export to .csv</a>
		</div>';
		
		echo '<div class="float-lg-right p-2">
        
            <a href="/SO/pencatatan/PDF2" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Export to .pdf</a>
		</div>';

	
		} else {

		//tampilin menu user biasa
	

		}
		?>

		
        </div>
		
        <!-- /.card-header -->
        <div class="card-body">
			
			
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pencatatan-grid',
	'dataProvider'=>$dataProvider3,
'columns'=>array(
    array(
        'name'=>'ID Jadwal',
        'type'=>'raw',
        'value'=>'$data["id_jadwal"]',
    ),
    array(
        'name'=>'Nama Apoteker',
        'type'=>'raw',
        'value'=>'$data["nama_apoteker"]',
    ),
      
		array(
			'name'=>'Nama Item ',
			'type'=>'raw',
			'value'=>'$data["nama_item"]',
        ),
        array(
			'name'=>'Batch Number',
			'type'=>'raw',
			'value'=>'$data["batch"]',
        ),
        array(
			'name'=>'Satuan',
			'type'=>'raw',
			'value'=>'$data["satuan"]',
        ),
       
        array(
			'name'=>'Lokasi Rak',
			'type'=>'raw',
			'value'=>'$data["lokasi_rak"]',
        ),
        array(
			'name'=>'Stok Tempat',
			'type'=>'raw',
			'value'=>'$data["stok_tempat"]',
        ),
       
	

		
	),
)); ?>

        </div>
        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->  

