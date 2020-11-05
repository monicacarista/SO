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
                'name'=>'Jumlah Stok SO',
                'type'=>'raw',
                'value'=>'$data["jml_stok_tem"]',
            ),
            
            array(
                'name'=>'Satuan',
                'type'=>'raw',
                'value'=>'$data["satuan"]',
            ),
    
            array(
                'name'=>'Harga Per Item',
                'type'=>'raw',
                //'value'=>'$data["harga"]',
                'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",$data["harga"])',
            ),
            
            
            array(
                'name'=>'Selisih Total Item',
                'type'=>'raw',
                'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",$data["ttl_selisih_item"])',
            ),
            array(
                'name'=>'Selisih Total Harga',
                'type'=>'raw',
                'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",$data["selisih_harga"])',
            ),
    
		),
		
		
		//Pencatatan::model()->getSelisih()
		
)); ?>