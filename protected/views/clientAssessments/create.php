<?php
/* @var $this ClientAssessmentsController */
/* @var $model ClientAssessments */

$this->breadcrumbs=array(
	'Client Assessments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientAssessments', 'url'=>array('index')),
	array('label'=>'Manage ClientAssessments', 'url'=>array('admin')),
);
?>

<h1>Create ClientAssessments</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>