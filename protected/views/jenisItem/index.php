<?php
/* @var $this JenisItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jenis Items',
);

$this->menu=array(
	array('label'=>'Create JenisItem', 'url'=>array('create')),
	array('label'=>'Manage JenisItem', 'url'=>array('admin')),
);
?>

<h1>Jenis Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
