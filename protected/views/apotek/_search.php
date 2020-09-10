<?php
/* @var $this ApotekController */
/* @var $model Apotek */
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
		<?php echo $form->label($model,'nama_apotek'); ?>
		<?php echo $form->textField($model,'nama_apotek',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lokasi_apotek'); ?>
		<?php echo $form->textField($model,'lokasi_apotek',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->