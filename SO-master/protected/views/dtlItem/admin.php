<?php
/* @var $this DtlItemController */
/* @var $model DtlItem */

$this->breadcrumbs=array(
	'Dtl Items'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DtlItem', 'url'=>array('index')),
	array('label'=>'Create DtlItem', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dtl-item-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Dtl Items</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dtl-item-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_dtl_item',
		array(
			'name'=>'id_apotek',
			'header'=>'Nama Apotek',
			'value'=>'$this->grid->getController()->getIdApotek($data->id_apotek)'
		),
		array(
			'name'=>'id_item',
			'header'=>'Nama Item',
			'value'=>'$this->grid->getController()->getIdItem($data->id_item)'
		),
		'id_item',
		'batch',
		'stok',
		'exp_date',
		'harga',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
