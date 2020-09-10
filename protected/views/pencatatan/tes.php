<div class="row">
		<?php echo $form->labelEx($model,'id_item'); ?>
		<?php 

echo $form->dropDownList($model,'id_item',CHtml::listData(Item::model()->findAll(), 'id_item', 'nama_item'),

                    array(

                        'prompt'=>'-Select Item-',

                        'ajax' => array

                        (

                        'type'=>'POST', 

                        'url'=>CController::createUrl('Item/tes'), //or $this->createUrl('loadcities') if '$this' extends CController

                        'update'=>'#id_rak', //or 'success' => 'function(data){...handle the data in the way you want...}',

                        'data'=>array('id_item'=>'js:this.value'),

                        )));

                ?>
		<?php echo $form->error($model,'id_item'); ?>
	</div>

    <div class="row">

<?php echo $form->labelEx($model,'id_rak'); ?>

<?php echo $form->dropDownList($model,'id_rak',array()); ?>

<?php echo $form->error($model,'id_rak'); ?>

</div>