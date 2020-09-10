<?php
/* @var $this ApotekController */
/* @var $model Apotek */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'apotek-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_apotek'); ?>
		<?php echo $form->textField($model,'nama_apotek',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'nama_apotek'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lokasi_apotek'); ?>
		<?php echo $form->textField($model,'lokasi_apotek',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'lokasi_apotek'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->