<?php
/* @var $this PencatatanController */
/* @var $model Pencatatan */

$this->breadcrumbs=array(
	'Pencatatans'=>array('admin'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pencatatan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<!-- Main content -->
<section class="content">
    <div class="card card-default">
        <div class="card-header">
        <h3 class="card-title">
            <!-- <i class="fas fa-bullhorn"></i> -->
           Detail Pencatatan
        </h3>
		
		 <div class="float-lg-right p-2">
            <a href="<?php echo Yii::app()->request->baseUrl?>/pencatatan/create" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Tambah</a>
		</div>
		
        </div>
		
        <!-- /.card-header -->
        <div class="card-body">
			
			
		<div class="search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>
		</div><!-- search-form -->

		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'pencatatan-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
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
				array(
					'class'=>'CButtonColumn',
				),
			),
		)); ?>

        </div>
        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->  
