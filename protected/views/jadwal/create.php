<?php
/* @var $this JadwalController */
/* @var $model Jadwal */

$this->breadcrumbs=array(
	'List Jadwal Pencatatan'=>array('index'),
	'Create',
);


?>

<!-- Main content -->
<section class="content">
    <div class="card card-default">
        <div class="card-header">
        <h3 class="card-title">
            <!-- <i class="fas fa-bullhorn"></i> -->
            Create Jadwal Stock Opname
        </h3>
		
        </div>
		
        <!-- /.card-header -->
        <div class="card-body">
			
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
 
        </div>
        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->  
