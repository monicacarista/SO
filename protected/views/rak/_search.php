<?php
/* @var $this RakController */
/* @var $model Rak */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_rak'); ?>
		<?php echo $form->textField($model,'id_rak'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lokasi_rak'); ?>
		<?php echo $form->textField($model,'lokasi_rak',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_item'); ?>
		<?php echo $form->textField($model,'id_item'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->