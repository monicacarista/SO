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
		
		
		} else {

		//tampilin menu user biasa
	

		}
		?>

		
        </div>
		
        <!-- /.card-header -->
        <div class="card-body">
		<?php if (Yii::app()->user->isAdmin()) {

//tampilin menu admin

			 $this->widget('zii.widgets.grid.CGridView', array(
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
						
					
						'(CHtml::link("<i class=\"fa fa-eye fa-lg\" style=\"color:#333333;\"></i> Detail",
								Yii::app()->request->baseUrl."/pencatatan/admin/".$data->id_so,
								array("class"=>"btn btn-mini", "style"=>"color:#333333;  margin-bottom:3px; margin-right:5px;"))).


								(CHtml::link("<i class=\"fa fa-file fa-lg\" style=\"margin-top:3px;\"></i> Report",
								Yii::app()->request->baseUrl."/pencatatan/report/".$data->id_so, 
								array("class"=>"btn btn-mini", "style"=>"color:#333333; margin-bottom:3px; margin-right:5px;"))).

							
						(CHtml::link("<i class=\"fa fa-trash fa-lg\" style=\"margin-top:3px;\"></i> Delete",
								Yii::app()->request->baseUrl."/eventSO/delete/".$data->id_so,
								array("class"=>"btn btn-mini btn-danger", "style"=>"color:#efefef; margin-bottom:3px; margin-right:5px;", 
					"onClick"=>"return confirm(\'Apakah Anda yakin akan menghapus affiliator ini?\')")));',
						'htmlOptions'=>array('width'=>'200px', 'style'=>'text-align:center;')
				),
					
				),
			)); 

		} else {

		//tampilin menu user biasa

		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'event-so-grid',
			'dataProvider'=>$dataProvider,

			'columns'=>array(
				array('name'=>'no',
				'type'=>'raw',
				'header' => 'No ',		
				'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
				'filter' => '',		
				),
				//'id_so',
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
					
				
					'(CHtml::link("<i class=\"fa fa-eye fa-lg\" style=\"color:#333333;\"></i> Detail",
							Yii::app()->request->baseUrl."/pencatatan/admin/".$data->id_so,
							array("class"=>"btn btn-mini", "style"=>"color:#333333;  margin-bottom:3px; margin-right:5px;")));',


					'htmlOptions'=>array('width'=>'200px', 'style'=>'text-align:center;')
			),
				
			),
		)); 


		}
		?>
			

		
        </div>
        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->  

