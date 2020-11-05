<h4>Report</h4>

<?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'pencatatan-grid',
				'dataProvider'=>$dataProvider1,
        
				'columns'=>array(
				
					array(
                        'name'=>'id_so',
                        'type'=>'raw',
						'header'=>'Id SO',
                        'value'=>'$data["id_so"]',
                        'htmlOptions'=>array('width'=>''),
                    ),

                    array(
                        'name'=>'id_item',
                        'type'=>'raw',
						'header'=>'Id Item',
                        'value'=>'$data["id_item"]',
                        'htmlOptions'=>array('width'=>''),
                    ),
        
                    array(
                        'name'=>'stok_tempat',
                        'type'=>'raw',
						'header'=>'Stok Tempat',
                        'value'=>'$data["stok_tempat"]',
                        'htmlOptions'=>array('width'=>''),
                    ),
        
                  
					
				),
			)); ?>