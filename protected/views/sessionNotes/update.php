<?php
/* @var $this SessionNotesController */
/* @var $model SessionNotes */

$this->breadcrumbs=array(
	'Session Notes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SessionNotes', 'url'=>array('index')),
	array('label'=>'Create SessionNotes', 'url'=>array('create')),
	array('label'=>'View SessionNotes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SessionNotes', 'url'=>array('admin')),
);
?>

<h1>Update SessionNotes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>