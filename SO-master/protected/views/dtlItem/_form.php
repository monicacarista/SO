<?php
/* @var $this DtlItemController */
/* @var $model DtlItem */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dtl-item-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_apotek'); ?>
		<?php echo CHtml::activeDropDownList($model, 'id_apotek', CHtml::listData(Apotek::model()->findAll(), 'id_apotek', 'nama_apotek'), array('empty'=>'Pilih Apotek')); ?>
		<?php echo $form->error($model,'id_apotek'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_item'); ?>
		<?php echo CHtml::activeDropDownList($model, 'id_item', CHtml::listData(Item::model()->findAll(), 'id_item', 'nama_item'), array('empty'=>'Pilih Item')); ?>
		<?php echo $form->error($model,'id_item'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'batch'); ?>
		<?php echo $form->textField($model,'batch',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'batch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stok'); ?>
		<?php echo $form->textField($model,'stok'); ?>
		<?php echo $form->error($model,'stok'); ?>
	</div>

	<div class="row">
     <?php echo $form->labelEx($model,'exp_date'); ?>
     <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
         'name' => 'exp_date',
         'attribute' => 'exp_date',
         'model'=>$model,
         'options'=> array(
             'dateFormat' =>'yy-mm-dd',
             'altFormat' =>'yy-mm-dd',
         ),
     )); 
     ?>
     <?php echo $form->error($model,'exp_date'); ?>
 </div>
	<div class="row">
		<?php echo $form->labelEx($model,'harga'); ?>
		<?php echo $form->textField($model,'harga'); ?>
		<?php echo $form->error($model,'harga'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->