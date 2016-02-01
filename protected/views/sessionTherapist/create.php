<?php
/* @var $this SessionTherapistController */
/* @var $model SessionTherapist */

$this->breadcrumbs=array(
	'Session Therapists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SessionTherapist', 'url'=>array('index')),
	array('label'=>'Manage SessionTherapist', 'url'=>array('admin')),
);
?>

<h1>Create SessionTherapist</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>