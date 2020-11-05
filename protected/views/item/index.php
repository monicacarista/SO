<?php
/* @var $this ItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Items',
);


?>


<!-- Main content -->
<section class="content">
    <div class="card card-default">
        <div class="card-header">
        <h3 class="card-title">
            <!-- <i class="fas fa-bullhorn"></i> -->
            List Item
        </h3>
		
		<?php if (Yii::app()->user->isAdmin()) {

		//tampilin menu admin

		
		echo '<div class="float-lg-right p-2">
            <a href="create" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Tambah</a>
		</div>';
		
		echo '<div class="float-lg-right p-2">
        
            <a href="admin" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Manage</a>
		</div>';
		echo '<div class="float-lg-right p-2">
        
            <a href="/SO/pencatatan/reportItem" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Report Item</a>
		</div>';
		
		
		} else {

		//tampilin menu user biasa
		
		echo '<div class="float-lg-right p-2">
            
            <a href="create" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Tambah</a>
    	</div>';

		}
		?>

		
        </div>
		
        <!-- /.card-header -->
        <div class="card-body">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'event-so-grid',
			'dataProvider'=>$dataProvider,
			
			'columns'=>array(
				array('name'=>'no',
				'type'=>'raw',
				'header' => 'No ',		
				'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
				'filter' => '',		
				),
				'kode_item',
				'nama_item',
				'satuan',
				'lokasi_rak',
				array('name' => 'item_barcode', 'type' => 'raw', 'value'=>'Item::getIdBarcode(array("id_item"=> $data->id_item, "barocde"=>$data->id_item))'),
			),
			
			
		)); ?>

		
<?php echo '<div id="showBarcode"><div>'; //the same id should be given to the extension item id  -->
 
 $optionsArray = array(
 'elementId'=> 'showBarcode', /*id of div or canvas*/
 'value'=> '4797001018719', /* value for EAN 13 be careful to set right values for each barcode type */
 'type'=>'ean13',/*supported types  ean8, ean13, upc, std25, int25, code11, code39, code93, code128, codabar, msi, datamatrix*/
  
 );
 $this->widget('ext.Yii-Barcode-Generator.Barcode', $optionsArray);
 ?>  

        </div>
        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->  

