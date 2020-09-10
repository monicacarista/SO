<?php
/* @var $this ApotekController */
/* @var $data Apotek */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_apotek')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_apotek), array('view', 'id'=>$data->id_apotek)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_apotek')); ?>:</b>
	<?php echo CHtml::encode($data->nama_apotek); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lokasi_apotek')); ?>:</b>
	<?php echo CHtml::encode($data->lokasi_apotek); ?>
	<br />


</div>