<?php
/* @var $this ApotekerController */
/* @var $data Apoteker */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_apoteker')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_apoteker), array('view', 'id'=>$data->id_apoteker)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_apoteker')); ?>:</b>
	<?php echo CHtml::encode($data->nama_apoteker); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_apoteker')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_apoteker); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_telp_apoteker')); ?>:</b>
	<?php echo CHtml::encode($data->no_telp_apoteker); ?>
	<br />


</div>