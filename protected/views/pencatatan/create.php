<?php
/* @var $this PencatatanController */
/* @var $model Pencatatan */

$this->breadcrumbs=array(
	'Pencatatans'=>array('index'),
	'Create',
);

?>

<!-- Main content -->
<section class="content">
    <div class="card card-default">
        <div class="card-header">
        <h3 class="card-title">
            <!-- <i class="fas fa-bullhorn"></i> -->
            Create Pencatatan Stock Opname
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
