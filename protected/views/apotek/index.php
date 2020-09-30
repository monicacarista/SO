<?php
/* @var $this ApotekController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Apoteks',
);

if (Yii::app()->user->isAdmin()) {

	//tampilin menu admin
	
	
	$this->menu=array(
		array('label'=>'Create Apotek', 'url'=>array('create')),
		array('label'=>'Manage Apotek', 'url'=>array('admin')),
	);
	} else {
	
	//tampilin menu user biasa
	$this->menu=array(
		array('label'=>'Create Apotek', 'url'=>array('create')),
	);
	}
?>

<h1>Apoteks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
