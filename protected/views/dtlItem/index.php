<?php
/* @var $this DtlItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dtl Items',
);

?>

<!-- Main content -->
<section class="content">
    <div class="card card-default">
        <div class="card-header">
        <h3 class="card-title">
            <!-- <i class="fas fa-bullhorn"></i> -->
            List Detail Item
        </h3>
		
		<?php if (Yii::app()->user->isAdmin()) {

		//tampilin menu admin

		
		echo '<div class="float-lg-right p-2">
            <a href="create" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Tambah</a>
		</div>';
		
		echo '<div class="float-lg-right p-2">
        
            <a href="admin" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Manage</a>
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
	'id'=>'dtlitem-grid',
	'dataProvider'=>$dataProvider,
	
	'columns'=>array(
		array('name'=>'no',
		'type'=>'raw',
		'header' => 'No ',		
		'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		'filter' => '',		
		),
		
		array(
			'name'=>'id_item',
			'header'=>'Nama Item',
			'value'=>'$this->grid->getController()->getIdItem($data->id_item)'
		),
		'batch',
		'stok',
		'exp_date',	
		array(
			'name'=>'harga',
			'header'=>'Harga Per Item',
			'value'=>'Yii::app()->numberFormatter->format("Rp ###,###,###",$data["harga"])',
		),
			
		
	),
)); ?>

        </div>
        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->  

