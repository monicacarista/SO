<?php
/* @var $this ItemController */
/* @var $model Item */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'item-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'nama_item'); ?>
		<?php echo $form->textField($model,'nama_item',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'nama_item'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'satuan'); ?>
		<?php echo $form->textField($model,'satuan',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'satuan'); ?>
	</div>

        <?php echo $form->labelEx($model,'lokasi_rak'); ?>
        <?php echo $form->textField($model,'lokasi_rak',array('size'=>60,'maxlength'=>150)); ?>
        <?php echo $form->error($model,'lokasi_rak'); ?>
    </div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->