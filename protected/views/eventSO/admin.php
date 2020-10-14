<?php
/* @var $this EventSOController */
/* @var $model EventSO */

$this->breadcrumbs=array(
	'Event Sos'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#event-so-grid').yiiGridView('update', {
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
            Manage Event Stock Opname
        </h3>
		
		 <div class="float-lg-right p-2">
            <a href="create" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Tambah</a>
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
			'id'=>'event-so-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				'id_so',
				
				'id_apoteker',
				array(
					'name'=>'id_apoteker',
					'header'=>'Nama Apoteker',
					'value'=>'$this->grid->getController()->getIdApoteker($data->id_apoteker)'
				),
				'tgl_mulai',
				'tgl_berakhir',
				
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

