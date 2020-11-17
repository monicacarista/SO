<?php
/* @var $this JadwalController */
/* @var $data Jadwal */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jadwal')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_jadwal), array('view', 'id'=>$data->id_jadwal)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_so')); ?>:</b>
	<?php echo CHtml::encode($data->id_so); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_staff')); ?>:</b>
	<?php echo CHtml::encode($data->id_staff); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jadwal_pengecekan')); ?>:</b>
	<?php echo CHtml::encode($data->jadwal_pengecekan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_item')); ?>:</b>
	<?php echo CHtml::encode($data->id_item); ?>
	<br />


</div>