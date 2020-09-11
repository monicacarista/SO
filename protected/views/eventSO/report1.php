<?php
/* @var $this EventSOController */
/* @var $model EventSO */

$this->breadcrumbs=array(
	'Event Sos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EventSO', 'url'=>array('index')),
	array('label'=>'Create EventSO', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#event-so-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Event Sos</h1>

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



<?php $this->widget('application.extensions.EExcelView', array(
	'id'=>'event-so-grid',
	'dataProvider'=>$model->getTes(),
	'autoWidth'=>true,
	'template' => "{summary}\n{items}\n{exportbuttons}\n{pager}",
	'exportType'=>'CSV',
	'grid_mode' => 'export',
	'filter'=>$model,
	'filename'=>'Report SO',
	'columns'=>array(
        array(
            'name'=>'ID SO',
            'type'=>'raw',
            'value'=>'$data["id_so"]',
             ),
            array(
                'name'=>'ID Item ',
                'type'=>'raw',
                'value'=>'$data["id_item"]',
            ),
          
            array(
                'name'=>'Nama Item ',
                'type'=>'raw',
                'value'=>'$data["nama_item"]',
            ),
            array(
                'name'=>'Jumlah Stok',
                'type'=>'raw',
                'value'=>'$data["jml_stok"]',
            ),
            array(
                'name'=>'Jumlah Stok Tempat',
                'type'=>'raw',
                'value'=>'$data["jml_stok_tem"]',
            ),
            
    
            array(
                'name'=>'Harga Per Item',
                'type'=>'raw',
                'value'=>'$data["harga"]',
            ),
            
            
            array(
                'name'=>'Selisih Total Item',
                'type'=>'raw',
                'value'=>'$data["ttl_selisih_item"]',
            ),
            array(
                'name'=>'Selisih Total Harga',
                'type'=>'raw',
                'value'=>'$data["selisih_harga"]',
            ),
    
    
		),
		
		
		//Pencatatan::model()->getSelisih()
		
)); ?>