<?php
/* @var $this DtlItemController */
/* @var $model DtlItem */

$this->breadcrumbs=array(
	'Dtl Items'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dtl-item-grid').yiiGridView('update', {
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
	'id'=>'dtl-item-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_dtl_item',
		array(
			'name'=>'id_apotek',
			'header'=>'Nama Apotek',
			'value'=>'$this->grid->getController()->getIdApotek($data->id_apotek)'
		),
		array(
			'name'=>'id_item',
			'header'=>'Nama Item',
			'value'=>'$this->grid->getController()->getIdItem($data->id_item)'
		),
		'id_item',
		'batch',
		'stok',
		'exp_date',
		'harga',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->  

