<?php
/* @var $this EventSOController */
/* @var $model EventSO */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'event-so-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
	<?php echo $form->labelEx($model,'id_apotek'); ?>
 	<?php echo CHtml::activeDropDownList($model, 'id_apotek', CHtml::listData(Apotek::model()->findAll(), 'id_apotek', 'nama_apotek'), array('empty'=>'Pilih Apotek')); ?>
	<?php echo $form->error($model,'id_apotek'); ?>
	</div>	




	<div class="row">
     <?php echo $form->labelEx($model,'tgl_mulai'); ?>
     <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
         'name' => 'tgl_mulai',
         'attribute' => 'tgl_mulai',
         'model'=>$model,
         'options'=> array(
             'dateFormat' =>'yy-mm-dd',
             'altFormat' =>'yy-mm-dd',
         ),
     )); 
     ?>
	</div>


	<div class="row">
     <?php echo $form->labelEx($model,'tgl_berakhir'); ?>
     <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
         'name' => 'tgl_berakhir',
         'attribute' => 'tgl_berakhir',
         'model'=>$model,
         'options'=> array(
             'dateFormat' =>'yy-mm-dd',
             'altFormat' =>'yy-mm-dd',
         ),
     )); 
     ?>
	</div>


	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->