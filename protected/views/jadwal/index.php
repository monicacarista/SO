<?php
/* @var $this EventSOController */
/* @var $model EventSO */

$this->breadcrumbs=array(
	'Jadwal'=>array('index'),
	'Index',
);


?>

<!-- Main content -->
<section class="content">
    <div class="card card-default">
        <div class="card-header">
        <h3 class="card-title">
            <!-- <i class="fas fa-bullhorn"></i> -->
           Jadwal Stock Opname
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
				'id'=>'jadwal-grid',
				'dataProvider'=>$dataProvider,

				'columns'=>array(
					array('name'=>'no',
					'type'=>'raw',
					'header' => 'No ',		
					'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
					'filter' => '',		
					),
					'id_jadwal',
					'id_so',
					array(
						'name'=>'id_apoteker',
						'header'=>'Nama Staff',
						'value'=>'$this->grid->getController()->getIdApoteker($data->id_apoteker)'
					),
				
				
				// 	array(
				// 		//'name'=>'',
				// 		'header'=>'Action', //column header
				// 		'type' =>'raw',
				// 		'value' =>
						
					
				// 		'(CHtml::link("<i class=\"fa fa-arrow-right fa-lg\" style=\"color:#333333;\"></i>Pilih Rak",
				// 				Yii::app()->request->baseUrl."/dtlJadwal/admin/".$data->id_jadwal,
				// 				array("class"=>"btn btn-mini", "style"=>"color:#333333;  margin-bottom:3px; margin-right:5px;")));',


				// 		'htmlOptions'=>array('width'=>'200px', 'style'=>'text-align:center;')
				// ),
					
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
				
				array(
					'name'=>'id_so',
					'header'=>'Periode SO',
					'value'=>'$this->grid->getController()->getPeriode($data->id_so)'
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

