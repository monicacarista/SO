<?php
/* @var $this PencatatanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pencatatans',
);

$this->menu=array(
	array('label'=>'Create Pencatatan', 'url'=>array('create')),
	array('label'=>'Manage Pencatatan', 'url'=>array('admin')),
);
?>

<h1>Pencatatans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
