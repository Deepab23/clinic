<?php
/* @var $this ClientAssessmentsController */
/* @var $model ClientAssessments */

$this->breadcrumbs=array(
	'Client Assessments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClientAssessments', 'url'=>array('index')),
	array('label'=>'Create ClientAssessments', 'url'=>array('create')),
	array('label'=>'Update ClientAssessments', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientAssessments', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientAssessments', 'url'=>array('admin')),
);
?>

<h1>View ClientAssessments #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_id',
		'url',
		'description',
		'date',
	),
)); ?>
