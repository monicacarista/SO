<?php
/* @var $this ItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Items',
);

if (Yii::app()->user->isAdmin()) {

	//tampilin menu admin
	
	
	$this->menu=array(
		array('label'=>'Create Item', 'url'=>array('create')),
		array('label'=>'Manage Item', 'url'=>array('admin')),
		array('label'=>'Create Detail Item', 'url'=>array('dtlItem/create')),
	);
	} else {
	
	//tampilin menu user biasa
	$this->menu=array(
		array('label'=>'Create Item', 'url'=>array('create')),
		array('label'=>'Create Detail Item', 'url'=>array('dtlItem/create')),
	);
	}
?>



<h1>List Item</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'event-so-grid',
	'dataProvider'=>$dataProvider,
	
	'columns'=>array(
		'id_item',
		'kode_item',
		'nama_item',
		'satuan',
		'lokasi_rak',
		array('name' => 'item_barcode', 'type' => 'raw', 'value'=>'Item::getItemBarcode(array("kode_item"=> $data->kode_item, "barocde"=>$data->kode_item))'),
	),
	
)); ?>
<?php echo '<div id="showBarcode"><div>'; //the same id should be given to the extension item id 
 
$optionsArray = array(
'elementId'=> 'showBarcode', /*id of div or canvas*/
'value'=> '4797001018719', /* value for EAN 13 be careful to set right values for each barcode type */
'type'=>'ean13',/*supported types  ean8, ean13, upc, std25, int25, code11, code39, code93, code128, codabar, msi, datamatrix*/
 
);
$this->widget('ext.Yii-Barcode-Generator.Barcode', $optionsArray);
?>

