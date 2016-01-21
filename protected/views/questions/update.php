<?php
/* @var $this QuestionsController */
/* @var $model Questions */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->Title=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Questions', 'url'=>array('index')),
	array('label'=>'Create Questions', 'url'=>array('create')),
	array('label'=>'View Questions', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Questions', 'url'=>array('admin')),
);
?>

<h1>Update Questions <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>