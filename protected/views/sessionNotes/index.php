<?php
/* @var $this SessionNotesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Session Notes',
);

$this->menu=array(
	array('label'=>'Create SessionNotes', 'url'=>array('create')),
	array('label'=>'Manage SessionNotes', 'url'=>array('admin')),
);
?>

<h1>Session Notes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
