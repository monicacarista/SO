<?php
/* @var $this JenisItemController */
/* @var $model JenisItem */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_jenis_item'); ?>
		<?php echo $form->textField($model,'id_jenis_item'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_jenis_item'); ?>
		<?php echo $form->textField($model,'nama_jenis_item',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->