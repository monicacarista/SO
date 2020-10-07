<?php
/* @var $this EventSOController */
/* @var $data EventSO */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_so')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_so), array('view', 'id'=>$data->id_so)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_apotek')); ?>:</b>
	<?php echo CHtml::encode($data->id_apotek); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_apoteker')); ?>:</b>
	<?php echo CHtml::encode($data->id_apoteker); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_mulai')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_mulai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_berakhir')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_berakhir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periodeSO')); ?>:</b>
	<?php echo CHtml::encode($data->periodeSO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_selisih_item')); ?>:</b>
	<?php echo CHtml::encode($data->total_selisih_item); ?>
	<br />


</div>