<?php
/* @var $this PencatatanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pencatatan'=>array('index'),
	'Index',
);

?>



<!-- Main content -->
<section class="content">
    <div class="card card-default">
        <div class="card-header">
        <h3 class="card-title">
            <!-- <i class="fas fa-bullhorn"></i> -->
            Pencatatan Stock Opname
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
	'id'=>'pencatatan-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array('name'=>'no',
		'type'=>'raw',
		'header' => 'No ',		
		'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		'filter' => '',		
		),
		
		array(
			'name'=>'id_dtl_item',
			'header'=>'BN',
			'value'=>'$this->grid->getController()->getBatch($data->id_dtl_item)'
		),
		array(
			'name'=>'id_item',
			'header'=>'Nama Item',
			'value'=>'$this->grid->getController()->getItem($data->id_item)'
		),
		
		'stok_tempat',
	
	),
)); ?>

        </div>
        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->  

