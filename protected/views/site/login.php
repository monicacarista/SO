<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>


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
/* @var $this EventSOController */
/* @var $model EventSO */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'event-so-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<p>Please fill out the following form with your login credentials:</p>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>


	<div class="container">
		<div class="row">
		<div class="col-25">
			<label for="username">Username</label>
		</div>
		<div class="col-25">
		<?php echo $form->textField($model,'username'); ?>
		
		</div>
		</div>

		<div class="row">
		<div class="col-25">
			<label for="password">Password</label>
		</div>
		<div class="col-25">
		<?php echo $form->passwordField($model,'password'); ?>
		</div>
		</div>

		<div class="row rememberMe">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><?php echo $form->checkBox($model,'rememberMe'); ?> Remember me</label>
        </div>
      </div>

		</div>

   
		
    <div class="row">
    <?php echo CHtml::link('Don`t have account',array('user/create'),array('class'=>'btn_signin')); ?>
    </div>

    <div class="row">
    <?php echo CHtml::submitButton('Login'); ?>
    </div>
    
    
    
<?php $this->endWidget(); ?>
  </form>
  <?php $this->endWidget(); ?>
</div>

</body>
</html>
