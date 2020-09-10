<?php
/* @var $this JenisItemController */
/* @var $model JenisItem */

$this->breadcrumbs=array(
	'Jenis Items'=>array('index'),
	$model->id_jenis_item=>array('view','id'=>$model->id_jenis_item),
	'Update',
);

$this->menu=array(
	array('label'=>'List JenisItem', 'url'=>array('index')),
	array('label'=>'Create JenisItem', 'url'=>array('create')),
	array('label'=>'View JenisItem', 'url'=>array('view', 'id'=>$model->id_jenis_item)),
	array('label'=>'Manage JenisItem', 'url'=>array('admin')),
);
?>

<h1>Update JenisItem <?php echo $model->id_jenis_item; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>