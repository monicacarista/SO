<?php
/* @var $this ItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Items',
);

$this->menu=array(
	array('label'=>'Create Apoteker', 'url'=>array('create')),
	array('label'=>'Manage Apoteker', 'url'=>array('admin')),
);
?>

<h1>Laporan Item</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'item-grid',
    'dataProvider' => $dataProvider,
    'ajaxUpdate' => true, //false if you want to reload aentire page (useful if sorting has an effect to other widgets)
    'filter' => null, //if not exist search filters
    'columns' => array(
       
        array(
            'header' => 'ID',
            'name' => 'id_item',
            //'value'=>'$data["MAIN_ID"]', //in the case we want something custom
        ),
        array(
            'header' => 'Nama Item',
            'name' => 'nama_item',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'Nama Item',
            'name' => 'nama_item',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'Satuan Item',
            'name' => 'satuan',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'Lokasi Rak',
            'name' => 'lokasi_rak',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
       //just use it in default way (but still we could use array(header,name)... )
        
        array( //we have to change the default url of the button(s)(Yii by default use $data->id.. but $data in our case is an array...)
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'buttons' => array(
                'delete' => array('url' => '$this->grid->controller->createUrl("delete",array("id"=>$data["id_item"]))'),
            ),
        ),
    ),
));
?>