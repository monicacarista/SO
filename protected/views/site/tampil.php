<?php echo CHtml::beginForm(array('site/exportExcel')); ?>
<?php $model = new EventSO();
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->search(),
    'filter'=>$model,
    'columns' => array(
    'id_so',    'id_apotek',
    'tgl_mulai',
    'tgl_berakhir',
    ),
));
?>
<?php echo CHtml::submitButton('Export'); ?>
<?php echo CHtml::endForm(); ?>
