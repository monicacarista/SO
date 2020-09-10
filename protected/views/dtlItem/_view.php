<?php
/* @var $this DtlItemController */
/* @var $data DtlItem */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dtl_item')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_dtl_item), array('view', 'id'=>$data->id_dtl_item)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_apotek')); ?>:</b>
	<?php echo CHtml::encode($data->id_apotek); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('id_item')); ?>:</b>
	<?php echo CHtml::encode($data->id_item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('batch')); ?>:</b>
	<?php echo CHtml::encode($data->batch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stok')); ?>:</b>
	<?php echo CHtml::encode($data->stok); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exp_date')); ?>:</b>
	<?php echo CHtml::encode($data->exp_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga')); ?>:</b>
	<?php echo CHtml::encode($data->harga); ?>
	<br />


</div>