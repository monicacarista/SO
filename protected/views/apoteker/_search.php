<?php
/* @var $this ApotekerController */
/* @var $model Apoteker */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_apoteker'); ?>
		<?php echo $form->textField($model,'id_apoteker'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_apoteker'); ?>
		<?php echo $form->textField($model,'nama_apoteker',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alamat_apoteker'); ?>
		<?php echo $form->textField($model,'alamat_apoteker',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_telp_apoteker'); ?>
		<?php echo $form->textField($model,'no_telp_apoteker'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->