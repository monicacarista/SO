<?php
/* @var $this User1Controller */
/* @var $model User1 */

$this->breadcrumbs=array(
	'User1s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List User1', 'url'=>array('index')),
	array('label'=>'Manage User1', 'url'=>array('admin')),
);
?>

<h1>Create User1</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>