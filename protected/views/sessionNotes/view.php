<?php
/* @var $this SessionNotesController */
/* @var $model SessionNotes */

$this->breadcrumbs=array(
	'Session Notes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SessionNotes', 'url'=>array('index')),
	array('label'=>'Create SessionNotes', 'url'=>array('create')),
	array('label'=>'Update SessionNotes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SessionNotes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SessionNotes', 'url'=>array('admin')),
);
?>

<h1>View SessionNotes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'session_id',
		'url',
		'description',
		'date',
	),
)); ?>
