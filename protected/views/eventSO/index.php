<?php
/* @var $this EventSOController */
/* @var $model EventSO */

$this->breadcrumbs=array(
	'Event Sos'=>array('index'),
	'Index',
);


?>

<!-- Main content -->
<section class="content">
    <div class="card card-default">
        <div class="card-header">
        <h3 class="card-title">
            <!-- <i class="fas fa-bullhorn"></i> -->
            Event Stock Opname
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
        
            <a href="report" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Report</a>
		</div>';
		
		} else {

		//tampilin menu user biasa
	

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
					'id_so',
					array(
						'name'=>'id_apoteker',
						'header'=>'Nama Apoteker',
						'value'=>'$this->grid->getController()->getIdApoteker($data->id_apoteker)'
					),
					'tgl_mulai',
					'tgl_berakhir',
					array(
						//'name'=>'',
						'header'=>'Action', //column header
						'type' =>'raw',
						'value' =>
						'(CHtml::link("<i class=\"fa fa-plus fa-lg\" style=\"color:#333333;\"></i> ",
								Yii::app()->request->baseUrl."/pencatatan/create/".$data->id_so,
								array("class"=>"btn btn-mini", "style"=>"color:#333333;  margin-bottom:3px; margin-right:5px;")))',
		
						
						'htmlOptions'=>array('width'=>'200px', 'style'=>'text-align:center;')
				),
					
				),
			)); ?>

		
        </div>
        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->  

