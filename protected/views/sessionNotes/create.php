<?php
/* @var $this SessionNotesController */
/* @var $model SessionNotes */

$this->breadcrumbs=array(
	'Session Notes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SessionNotes', 'url'=>array('index')),
	array('label'=>'Manage SessionNotes', 'url'=>array('admin')),
);
?>

<h1>Create SessionNotes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>