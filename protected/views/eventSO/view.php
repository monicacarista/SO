<?php
/* @var $this EventSOController */
/* @var $model EventSO */

$this->breadcrumbs=array(
	'Event Sos'=>array('index'),
	$model->id_so,
);


?>
<h1>View EventSO #<?php echo $model->id_so; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_so',
		'id_apoteker',
		'periodeSO',
		'tgl_mulai',
		'tgl_berakhir',
	),
)); ?>
