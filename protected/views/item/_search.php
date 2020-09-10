<?php
/* @var $this ItemController */
/* @var $model Item */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_item'); ?>
		<?php echo $form->textField($model,'id_item'); ?>
	</div>


	<div class="row">
		<?php echo $form->label($model,'nama_item'); ?>
		<?php echo $form->textField($model,'nama_item',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'satuan'); ?>
		<?php echo $form->textField($model,'satuan',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
        <?php echo $form->label($model,'lokasi_rak'); ?>
        <?php echo $form->textField($model,'lokasi_rak',array('size'=>60,'maxlength'=>150)); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->