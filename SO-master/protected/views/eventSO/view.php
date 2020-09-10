<?php
/* @var $this EventSOController */
/* @var $model EventSO */

$this->breadcrumbs=array(
	'Event Sos'=>array('index'),
	$model->id_so,
);

$this->menu=array(
	array('label'=>'List EventSO', 'url'=>array('index')),
	array('label'=>'Create EventSO', 'url'=>array('create')),
	array('label'=>'Update EventSO', 'url'=>array('update', 'id'=>$model->id_so)),
	array('label'=>'Delete EventSO', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_so),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EventSO', 'url'=>array('admin')),
);
?>

<h1>View EventSO #<?php echo $model->id_so; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_so',
		'id_apotek',
		'tgl_mulai',
		'tgl_berakhir',
		'total_selisih_item',
	),
)); ?>
