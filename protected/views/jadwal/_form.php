<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>
<?php
/* @var $this PencatatanController */
/* @var $model Pencatatan */
/* @var $form CActiveForm */
?>

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
        <label for="id_apoteker">Apoteker/Staff</label>
      </div>
      <div class="col-75">
      <?php 
     $this->widget('ext.select2.ESelect2',array(
		'model'=>$model,
		'attribute'=>'id_apoteker',
		'data'=>CHtml::listData(
		  Apoteker::model()->findAll(), 'id_apoteker', 'nama_apoteker'),
  
		'options'=>array(
		  'placeholder'=>'Pilih Apoteker',
		  'allowClear'=>true,
	  ),
	  'htmlOptions'=>array(						
		  'options'=>array(					  								        ''=>array('value'=>null,'selected'=>null),
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
      <div class="col-75">
	  <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
         'name' => 'jadwal_pengecekan',
         'attribute' => 'jadwal_pengecekan',
         'model'=>$model,
         'options'=> array(
             'dateFormat' =>'yy-mm-dd',
             'altFormat' =>'yy-mm-dd',
         ),
     )); 
     ?>
      </div>
    </div>
    <br>
    
    <div class="row">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
    
<?php $this->endWidget(); ?>
  </form>
</div>

</body>
</html>
