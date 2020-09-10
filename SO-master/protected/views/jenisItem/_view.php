<?php
/* @var $this JenisItemController */
/* @var $data JenisItem */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jenis_item')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_jenis_item), array('view', 'id'=>$data->id_jenis_item)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_jenis_item')); ?>:</b>
	<?php echo CHtml::encode($data->nama_jenis_item); ?>
	<br />


</div>