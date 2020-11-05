<h4>Report</h4>

<?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'pencatatan-grid',
				'dataProvider'=>$model->reportSe(),
        
				'columns'=>array(
				
					// array(
                    //     'name'=>'id_so',
                    //     'type'=>'raw',
					// 	'header'=>'Id SO',
                    //     'value'=>'$data["id_so"]',
                    //     'htmlOptions'=>array('width'=>''),
                    // ),

                    // array(
                    //     'name'=>'id_item',
                    //     'type'=>'raw',
					// 	'header'=>'Id Item',
                    //     'value'=>'$data["id_item"]',
                    //     'htmlOptions'=>array('width'=>''),
                    // ),
                   
                    // array(
                    //     'name'=>'nama_item',
                    //     'type'=>'raw',
					// 	'header'=>'Nama Item',
                    //     'value'=>'CHtml::encode($data->nama_item)',
                    //     'htmlOptions'=>array('width'=>''),
                    // ),
        
                    array(
                        'name'=>'stok_tempat',
                        'type'=>'raw',
						'header'=>'Stok Tempat',
                        'value'=>'$data["nama_item"]',
                        'htmlOptions'=>array('width'=>''),
                    ),
        
                  
					
				),
			)); ?>