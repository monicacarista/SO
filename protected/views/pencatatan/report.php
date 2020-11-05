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
            Report Stock Opname
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
			'name'=>'Jumlah Stok SO',
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

        </div>
        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->  

