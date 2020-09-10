<?php
/* @var $this DtlItemController */
/* @var $model DtlItem */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="row">
		<?php echo $form->label($model,'id_apotek'); ?>
		<?php echo $form->textField($model,'id_apotek'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_dtl_item'); ?>
		<?php echo $form->textField($model,'id_dtl_item'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_item'); ?>
		<?php echo $form->textField($model,'id_item'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'batch'); ?>
		<?php echo $form->textField($model,'batch',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stok'); ?>
		<?php echo $form->textField($model,'stok'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exp_date'); ?>
		<?php echo $form->textField($model,'exp_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'harga'); ?>
		<?php echo $form->textField($model,'harga'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->