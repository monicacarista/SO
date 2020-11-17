<?php
/* @var $this DtlJadwalController */
/* @var $data DtlJadwal */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dtl_jadwal')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_dtl_jadwal), array('view', 'id'=>$data->id_dtl_jadwal)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::encode($data->id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jadwal')); ?>:</b>
	<?php echo CHtml::encode($data->id_jadwal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_item')); ?>:</b>
	<?php echo CHtml::encode($data->id_item); ?>
	<br />


</div>