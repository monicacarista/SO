<?php
/* @var $this JadwalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'List Jadwal Pencatatan',
);

?>


<!-- Main content -->
<section class="content">
    <div class="card card-default">
        <div class="card-header">
        <h3 class="card-title">
            <!-- <i class="fas fa-bullhorn"></i> -->
            List Jadwal Stock Opname
        </h3>
		
		<div class="float-lg-right p-2">
            <a href="create" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Tambah</a>
		</div>
		
		<div class="float-lg-right p-2">
        
            <a href="admin" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Manage</a>
		</div>
		
		
        </div>
		
        <!-- /.card-header -->
        <div class="card-body">
			
		<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'jadwal-grid',
		'dataProvider'=>$dataProvider,
		
		'columns'=>array(
			array(
				'name'=>'id_apoteker',
				'header'=>'Nama Apoteker',
				'value'=>'$this->grid->getController()->getIdApoteker($data->id_apoteker)'
			),
			'jadwal_pengecekan',
			
		),
		)); ?>

        </div>
        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->  

