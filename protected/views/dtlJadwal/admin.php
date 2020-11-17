<?php
/* @var $this PencatatanController */
/* @var $model Pencatatan */

$this->breadcrumbs=array(
	'Detail Jadwal'=>array('admin'),
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
          List Item SO
        </h3>
		
		<?php if (Yii::app()->user->isAdmin()) { ?>			
			<div class="float-lg-right p-2">
			<a href="<?php echo Yii::app()->request->baseUrl?>/dtlJadwal/create" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Tambah Item SO</a>
			</div>

			<div class="float-lg-right p-2">
			<a href="<?php echo Yii::app()->request->baseUrl?>/Pencatatan/create" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Tambah</a>
			</div>

		<?php } else { ?>
			
			<div class="float-lg-right p-2">
			<a href="<?php echo Yii::app()->request->baseUrl?>/Pencatatan/create" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Tambah</a>
			</div>

		<?php } ?>

        </div>
		
        <!-- /.card-header -->
        <div class="card-body">
			
		
	
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dtl-jadwal-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'no',
				'type'=>'raw',
				'header' => 'No ',		
				'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
				'filter' => '',		
				),
				
		'id_jadwal',
		array(
			'name'=>'id',
			'header'=>'Nama Staff',
			'value'=>'$this->grid->getController()->getIdStaff($data->id)'
				),
		array(
			'name'=>'id_item',
			'header'=>'Lokasi Rak Item',
			'value'=>'$this->grid->getController()->getRak($data->id_item)'
			),

		array(
			'name'=>'id_item',
			'header'=>'Nama Item',
			'value'=>'$this->grid->getController()->getItem($data->id_item)'
			),
			array(
				'name'=>'id_item',
				'header'=>'Stok SO',
				'value'=>'$this->grid->getController()->getStok($data->id_item)'
				),
		// array(
		// 	'class'=>'CButtonColumn',
		// ),
	),
)); ?>


<table class="table" style="width:750px">
    <tr>
     
        <td> No</td>
        <td>Nama Staff</td>
        <td style="text-align:right;">Lokasi Rak Item</td>
        <td>Nama Item</td>
		<td>Stok SO</td>
    </tr>
	<?php
	echo "<tr>";
	echo "<td> </td>"

	?>

        </div>
        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->  

