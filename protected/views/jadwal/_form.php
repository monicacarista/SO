<?php
/* @var $this JadwalController */
/* @var $model Jadwal */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jadwal-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="container">
	<div class="row">
      <div class="col-25">
        <label for="id_apoteker">Apoteker</label>
      </div>
      <div class="col-75">
      <?php 
    $this->widget('ext.select2.ESelect2',array(
      'model'=>$model,
      'attribute'=>'id_apoteker',
      'data'=>CHtml::listData(
        User::model()->findAll(array("condition"=>"id > 1")), 'id', 'username'),

      'options'=>array(
		'placeholder'=>'Pilih Staff',
		'allowClear'=>true,
	),
	'htmlOptions'=>array(						
		'options'=>array( ''=>array('value'=>null,'selected'=>null),
		),
	),		
    )); 
    ?>
      </div>
    </div>



    <div class="row">
      <div class="col-25">
        <label for="jadwal_pengecekan">Jadwal Pengecekan</label>
      </div>
      <div class="col-25">
      <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
         'name' => 'jadwal_pengecekan',
         'attribute' => 'jadwal_pengecekan',
         'flat' => true,
         'model'=>$model,
         'options'=> array(
             'dateFormat' =>'yy-mm-dd',
             'altFormat' =>'yy-mm-dd',
            
        'changeMonth' => true,
        'changeYear' => true
            
         ),
     )); 
   
     ?> 
      </div>
    </div>
    
  	<div class="row">
      <div class="col-25">
        <label for="id_item">Lokasi Rak</label>
      </div>
      <div class="col-75">
      <?php 
    $this->widget('ext.select2.ESelect2',array(
      'model'=>$model,
      'attribute'=>'id_item',
      'data'=>CHtml::listData(
        Item::model()->findAll(), 'id_item', 'lokasi_rak'),

      'options'=>array(
		'placeholder'=>'Pilih Rak ',
		'allowClear'=>true,
	),
	'htmlOptions'=>array(						
		'options'=>array( ''=>array('value'=>null,'selected'=>null),
		),
	),		
    )); 
    ?>
      </div>
    </div>



    
    <div class="row">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
    
<?php $this->endWidget(); ?>
  </form>
</div>

</div><!-- form -->