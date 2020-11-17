<?php
/* @var $this User1Controller */
/* @var $model User1 */

$this->breadcrumbs=array(
	'User1s'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List User1', 'url'=>array('index')),
	array('label'=>'Create User1', 'url'=>array('create')),
	array('label'=>'View User1', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User1', 'url'=>array('admin')),
);
?>

<h1>Update User1 <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>