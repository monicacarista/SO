<?php
/* @var $this EventSOController */
/* @var $model EventSO */

$this->breadcrumbs=array(
	'Event Sos'=>array('index'),
	$model->id_so=>array('view','id'=>$model->id_so),
	'Update',
);

$this->menu=array(
	array('label'=>'List EventSO', 'url'=>array('index')),
	array('label'=>'Create EventSO', 'url'=>array('create')),
	array('label'=>'View EventSO', 'url'=>array('view', 'id'=>$model->id_so)),
	array('label'=>'Manage EventSO', 'url'=>array('admin')),
);
?>

<h1>Update EventSO <?php echo $model->id_so; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>