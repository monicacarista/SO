<?php
/* @var $this PencatatanController */
/* @var $model Pencatatan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pencatatan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>



	<div class="row">
	<?php echo $form->labelEx($model,'id_item'); ?>
    <?php 
    $this->widget('ext.select2.ESelect2',array(
      'model'=>$model,
      'attribute'=>'id_item',
      'data'=>CHtml::listData(
        Item::model()->findAll(), 'id_item', 'nama_item'),

      'options'=>array(
		'placeholder'=>'Pilih Item',
		'allowClear'=>true,
	),
	'htmlOptions'=>array(						
		'options'=>array(					  								        ''=>array('value'=>null,'selected'=>null),
		),
	),		
    )); 
    ?>
    <?php echo $form->error($model,'id_item'); ?>
	</div>

	<div class="row">
	<?php echo $form->labelEx($model,'id_dtl_item'); ?>
    <?php 
    $this->widget('ext.select2.ESelect2',array(
      'model'=>$model,
      'attribute'=>'id_dtl_item',
      'data'=>CHtml::listData(
        DtlItem::model()->findAll(), 'id_dtl_item', 'batch'),

      'options'=>array(
		'placeholder'=>'Pilih Batch Number',
		'allowClear'=>true,
	),
	'htmlOptions'=>array(						
		'options'=>array(					  								        ''=>array('value'=>null,'selected'=>null),
		),
	),		
    )); 
    ?>
    <?php echo $form->error($model,'id_dtl_item'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stok_tempat'); ?>
		<?php echo $form->textField($model,'stok_tempat'); ?>
		<?php echo $form->error($model,'stok_tempat'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->