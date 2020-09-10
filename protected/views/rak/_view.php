<?php
/* @var $this RakController */
/* @var $data Rak */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rak')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rak), array('view', 'id'=>$data->id_rak)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lokasi_rak')); ?>:</b>
	<?php echo CHtml::encode($data->lokasi_rak); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_item')); ?>:</b>
	<?php echo CHtml::encode($data->id_item); ?>
	<br />


</div>