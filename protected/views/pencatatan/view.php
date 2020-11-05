<?php
/* @var $this PencatatanController */
/* @var $model Pencatatan */

$this->breadcrumbs=array(
	'Pencatatans'=>array('/eventSO/admin'),
	$model->id_pencatatan,
);

?>
<h1>View Pencatatan #<?php echo $model->id_pencatatan; ?></h1>

<div class="float-lg-right p-2">
            
            <a href="create" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Tambah</a>
    	</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_pencatatan',
		'id_item',
		'id_dtl_item',
		'stok_tempat',
	),
)); ?>
