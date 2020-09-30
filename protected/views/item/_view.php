<?php
/* @var $this ItemController */
/* @var $data Item */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_item')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_item), array('view', 'id'=>$data->id_item)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_item')); ?>:</b>
	<?php echo CHtml::encode($data->kode_item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_item')); ?>:</b>
	<?php echo CHtml::encode($data->nama_item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('satuan')); ?>:</b>
	<?php echo CHtml::encode($data->satuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lokasi_rak')); ?>:</b>
	<?php echo CHtml::encode($data->lokasi_rak); ?>
	<br />


</div>