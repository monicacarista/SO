<?php
/* @var $this DtlItemController */
/* @var $model DtlItem */

$this->breadcrumbs=array(
	'Dtl Items'=>array('index'),
	$model->id_dtl_item=>array('view','id'=>$model->id_dtl_item),
	'Update',
);

$this->menu=array(
	array('label'=>'List DtlItem', 'url'=>array('index')),
	array('label'=>'Create DtlItem', 'url'=>array('create')),
	array('label'=>'View DtlItem', 'url'=>array('view', 'id'=>$model->id_dtl_item)),
	array('label'=>'Manage DtlItem', 'url'=>array('admin')),
);
?>

<h1>Update DtlItem <?php echo $model->id_dtl_item; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>