<?php
/* @var $this JadwalController */
/* @var $data Jadwal */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jadwal')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_jadwal), array('view', 'id'=>$data->id_jadwal)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_apoteker')); ?>:</b>
	<?php echo CHtml::encode($data->id_apoteker); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jadwal_pengecekan')); ?>:</b>
	<?php echo CHtml::encode($data->jadwal_pengecekan); ?>
	<br />


</div>