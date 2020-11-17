<?php
/* @var $this PencatatanController */
/* @var $model Pencatatan */

$this->breadcrumbs=array(
	'Jadwal'=>array('admin'),
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
           Detail Jadwal
        </h3>
		
		<?php if (Yii::app()->user->isAdmin()) { ?>			
			<div class="float-lg-right p-2">
			<a href="<?php echo Yii::app()->request->baseUrl?>/Jadwal/create" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Tambah</a>
			</div>
		<?php } else { ?>
			


		<?php } ?>
	
        </div>
		
        <!-- /.card-header -->
        <div class="card-body">
			
			
		<div class="search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>
		</div><!-- search-form -->

	
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jadwal-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_jadwal',
		'id_so',
		array(
			'name'=>'id_apoteker',
			'header'=>'Nama Staff',
			'value'=>'$this->grid->getController()->getIdStaff($data->id_apoteker)'
		),
		array(
			'name'=>'id_item',
			'header'=>'Lokasi Rak',
			'value'=>'$this->grid->getController()->getRak($data->id_item)'
		),
		array(
			'name'=>'id_item',
			'header'=>'Nama Item',
			'value'=>'$this->grid->getController()->getItem($data->id_item)'
		),

		'jadwal_pengecekan',
		array(
			//'name'=>'',
			'header'=>'Action', //column header
			'type' =>'raw',
			'value' =>
			
		
			'(CHtml::link("<i class=\"fa fa-eye fa-lg\" style=\"color:#333333;\"></i> Start SO",
					Yii::app()->request->baseUrl."/pencatatan/admin/".$data->id_jadwal,
					array("class"=>"btn btn-mini", "style"=>"color:#333333;  margin-bottom:3px; margin-right:5px;"))).

					
			(CHtml::link("<i class=\"fa fa-trash fa-lg\" style=\"margin-top:3px;\"></i> Delete",
					Yii::app()->request->baseUrl."/jadwal/delete/".$data->id_jadwal,
					array("class"=>"btn btn-mini btn-danger", "style"=>"color:#efefef; margin-bottom:3px; margin-right:5px;", 
		"onClick"=>"return confirm(\'Apakah Anda yakin akan menghapus affiliator ini?\')")));',
			'htmlOptions'=>array('width'=>'200px', 'style'=>'text-align:center;')
	),
		// array(
		// 	'class'=>'CButtonColumn',
		// ),
	),
)); ?>

        </div>
        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->  




