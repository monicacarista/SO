<?php
/* @var $this PencatatanController */
/* @var $model Pencatatan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_pencatatan'); ?>
		<?php echo $form->textField($model,'id_pencatatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_so'); ?>
		<?php echo $form->textField($model,'id_so'); ?>
	</div>


	<div class="row">
		<?php echo $form->label($model,'id_jadwal'); ?>
		<?php echo $form->textField($model,'id_jadwal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_item'); ?>
		<?php echo $form->textField($model,'id_item'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stok_tempat'); ?>
		<?php echo $form->textField($model,'stok_tempat'); ?>
	</div>


	<div class="row">
        <?php echo $form->label($model,'id_dtl_item'); ?>
        <?php echo $form->textField($model,'id_dtl_item',array('size'=>11,'maxlength'=>11)); ?>
    </div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->