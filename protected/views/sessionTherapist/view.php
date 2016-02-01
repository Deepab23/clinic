<?php
/* @var $this SessionTherapistController */
/* @var $model SessionTherapist */

$this->breadcrumbs=array(
	'Session Therapists'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SessionTherapist', 'url'=>array('index')),
	array('label'=>'Create SessionTherapist', 'url'=>array('create')),
	array('label'=>'Update SessionTherapist', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SessionTherapist', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SessionTherapist', 'url'=>array('admin')),
);
?>

<h1>View SessionTherapist #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'session_id',
		'therapist_id',
		'total_time',
	),
)); ?>
