<?php
/* @var $this EventSOController */
/* @var $model EventSO */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_so'); ?>
		<?php echo $form->textField($model,'id_so'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_apotek'); ?>
		<?php echo $form->textField($model,'id_apotek'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_apoteker'); ?>
		<?php echo $form->textField($model,'id_apoteker'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl_mulai'); ?>
		<?php echo $form->textField($model,'tgl_mulai'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl_berakhir'); ?>
		<?php echo $form->textField($model,'tgl_berakhir'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'periodeSO'); ?>
		<?php echo $form->textField($model,'periodeSO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_selisih_item'); ?>
		<?php echo $form->textField($model,'total_selisih_item'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->