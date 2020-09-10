<?php
/* @var $this DtlItemController */
/* @var $model DtlItem */

$this->breadcrumbs=array(
	'Dtl Items'=>array('index'),
	$model->id_dtl_item,
);

$this->menu=array(
	array('label'=>'List DtlItem', 'url'=>array('index')),
	array('label'=>'Create DtlItem', 'url'=>array('create')),
	array('label'=>'Update DtlItem', 'url'=>array('update', 'id'=>$model->id_dtl_item)),
	array('label'=>'Delete DtlItem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_dtl_item),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DtlItem', 'url'=>array('admin')),
);
?>

<h1>View DtlItem #<?php echo $model->id_dtl_item; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_dtl_item',
		'id_apotek',
		'id_item',
		'batch',
		'stok',
		'exp_date',
		'harga',
	),
)); ?>
