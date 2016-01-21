<?php
/* @var $this SectionController */
/* @var $model Section */

$this->breadcrumbs=array(
	'Sections'=>array('index'),
	$model->Title=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Section', 'url'=>array('index')),
	array('label'=>'Create Section', 'url'=>array('create')),
	array('label'=>'View Section', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Section', 'url'=>array('admin')),
);
?>

<h1>Update Section <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>