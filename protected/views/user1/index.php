<?php
/* @var $this User1Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User1s',
);

$this->menu=array(
	array('label'=>'Create User1', 'url'=>array('create')),
	array('label'=>'Manage User1', 'url'=>array('admin')),
);
?>

<h1>User1s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
