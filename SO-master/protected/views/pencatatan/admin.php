<?php
/* @var $this PencatatanController */
/* @var $model Pencatatan */

$this->breadcrumbs=array(
	'Pencatatans'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Pencatatan', 'url'=>array('index')),
	array('label'=>'Create Pencatatan', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pencatatan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pencatatans</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pencatatan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_pencatatan',
		array(
			'name'=>'id_so',
			'header'=>'ID SO',
			'value'=>'$this->grid->getController()->getIdSO($data->id_so)'
		),
		'id_jadwal',
		
		array(
			'name'=>'id_item',
			'header'=>'Nama Item',
			'value'=>'$this->grid->getController()->getIdItem($data->id_item)'
		),
		'stok_tempat',
		
		//Pencatatan::model()->getSelisih()
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
