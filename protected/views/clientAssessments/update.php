<?php
/* @var $this ClientAssessmentsController */
/* @var $model ClientAssessments */

$this->breadcrumbs=array(
	'Client Assessments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientAssessments', 'url'=>array('index')),
	array('label'=>'Create ClientAssessments', 'url'=>array('create')),
	array('label'=>'View ClientAssessments', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientAssessments', 'url'=>array('admin')),
);
?>

<h1>Update ClientAssessments <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>