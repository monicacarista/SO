<?php
/* @var $this RakController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Raks',
);

$this->menu=array(
	array('label'=>'Create Rak', 'url'=>array('create')),
	array('label'=>'Manage Rak', 'url'=>array('admin')),
);
?>

<h1>Raks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
