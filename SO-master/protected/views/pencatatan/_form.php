<?php
/* @var $this PencatatanController */
/* @var $model Pencatatan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pencatatan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
     <?php echo $form->labelEx($model,'id_jadwal'); ?>
     <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
         'name' => 'id_jadwal',
         'attribute' => 'id_jadwal',
         'model'=>$model,
         'options'=> array(
             'dateFormat' =>'yy-mm-dd',
             'altFormat' =>'yy-mm-dd',
         ),
     )); 
     ?>
	</div>

	 
	<div class="row">
   <?php echo $form->labelEx($model,'id_so'); ?>
   <?php echo CHtml::activeDropDownList($model, 'id_so', CHtml::listData(EventSO::model()->findAll(), 'id_so','id_so'), array('empty'=>'Pilih ID Stock Opname')); ?>
   <?php echo $form->error($model,'id_so'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_item'); ?>
    <?php echo CHtml::activeDropDownList($model, 'id_item', CHtml::listData(Item::model()->findAll(), 'id_item', 'nama_item'), array('empty'=>'Pilih Item')); ?>
		<?php echo $form->error($model,'id_item'); ?>
	</div>
	

	<div class="row">
        <?php echo $form->labelEx($model,'id_dtl_item'); ?>
        <?php echo CHtml::activeDropDownList($model, 'id_dtl_item', CHtml::listData(DtlItem::model()->findAll(), 'id_dtl_item', 'batch'), array('empty'=>'Pilih No Batch'), array('size'=>6,'maxlength'=>6)); ?>
        <?php echo $form->error($model,'id_dtl_item'); ?>
    </div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'stok_tempat'); ?>
		<?php echo $form->textField($model,'stok_tempat'); ?>
		<?php echo $form->error($model,'stok_tempat'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->