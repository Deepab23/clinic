<?php
/* @var $this ClientAssessmentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Assessments',
);

$this->menu=array(
	array('label'=>'Create ClientAssessments', 'url'=>array('create')),
	array('label'=>'Manage ClientAssessments', 'url'=>array('admin')),
);
?>

<h1>Client Assessments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
