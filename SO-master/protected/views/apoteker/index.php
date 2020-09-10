<?php
/* @var $this ApotekerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Apotekers',
);

$this->menu=array(
	array('label'=>'Create Apoteker', 'url'=>array('create')),
	array('label'=>'Manage Apoteker', 'url'=>array('admin')),
);
?>

<h1>Apotekers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
