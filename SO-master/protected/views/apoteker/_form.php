<?php
/* @var $this ApotekerController */
/* @var $model Apoteker */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'apoteker-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_apoteker'); ?>
		<?php echo $form->textField($model,'nama_apoteker',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'nama_apoteker'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat_apoteker'); ?>
		<?php echo $form->textField($model,'alamat_apoteker',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'alamat_apoteker'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_telp_apoteker'); ?>
		<?php echo $form->textField($model,'no_telp_apoteker'); ?>
		<?php echo $form->error($model,'no_telp_apoteker'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->