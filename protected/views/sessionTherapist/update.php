<?php
/* @var $this SessionTherapistController */
/* @var $model SessionTherapist */

$this->breadcrumbs=array(
	'Session Therapists'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SessionTherapist', 'url'=>array('index')),
	array('label'=>'Create SessionTherapist', 'url'=>array('create')),
	array('label'=>'View SessionTherapist', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SessionTherapist', 'url'=>array('admin')),
);
?>

<h1>Update SessionTherapist <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>