<?php
/* @var $this EventSOController */
/* @var $model EventSO */

$this->breadcrumbs=array(
	'Event Sos'=>array('index'),
	'Manage',
);


?>

<!-- Main content -->
<section class="content">
    <div class="card card-default">
        <div class="card-header">
        <h3 class="card-title">
            <!-- <i class="fas fa-bullhorn"></i> -->
            Event Stock Opname
        </h3>
		
		<?php if (Yii::app()->user->isAdmin()) {

		//tampilin menu admin

		
		echo '<div class="float-lg-right p-2">
            <a href="create" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Tambah</a>
		</div>';
		
		echo '<div class="float-lg-right p-2">
        
            <a href="admin" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Manage</a>
		</div>';
		
		} else {

		//tampilin menu user biasa
		
		echo '<div class="float-lg-right p-2">
            
            <a href="eventSO/create" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Tambah</a>
    	</div>';

		}
		?>

		
        </div>
		
        <!-- /.card-header -->
        <div class="card-body">
			
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'event-so-grid',
				'dataProvider'=>$dataProvider,

				'columns'=>array(
					'id_so',
					array(
						'name'=>'id_apoteker',
						'header'=>'Nama Apoteker',
						'value'=>'$this->grid->getController()->getIdApoteker($data->id_apoteker)'
					),
					'tgl_mulai',
					'tgl_berakhir',
					
					
				),
			)); ?>
<!-- 
			<?php echo CHtml::link('Create Pencatatan', array('Pencatatan/create')); ?> -->
        </div>
        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->  

