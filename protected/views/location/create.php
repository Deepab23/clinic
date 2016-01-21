<?php
/* @var $this LocationController */
/* @var $model Location */

$this->breadcrumbs=array(
	'Locations'=>array('index'),
	'Create',
);


?>

<h1>Create Location</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>