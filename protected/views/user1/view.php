<?php
/* @var $this User1Controller */
/* @var $model User1 */

$this->breadcrumbs=array(
	'User1s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List User1', 'url'=>array('index')),
	array('label'=>'Create User1', 'url'=>array('create')),
	array('label'=>'Update User1', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User1', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User1', 'url'=>array('admin')),
);
?>

<h1>View User1 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'last_login',
		'superuser',
		'status',
		'roles_id',
		'date_created',
		'time_update',
	),
)); ?>
