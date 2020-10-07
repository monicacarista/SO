<?php
/* @var $this PencatatanController */
/* @var $data Pencatatan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pencatatan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pencatatan), array('view', 'id'=>$data->id_pencatatan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_item')); ?>:</b>
	<?php echo CHtml::encode($data->id_item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stok_tempat')); ?>:</b>
	<?php echo CHtml::encode($data->stok_tempat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dtl_item')); ?>:</b>
	<?php echo CHtml::encode($data->id_dtl_item); ?>
	<br />


</div>