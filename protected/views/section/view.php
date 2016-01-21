<?php
/* @var $this SectionController */
/* @var $model Section */

$this->breadcrumbs=array(
	'Sections'=>array('index'),
	$model->Title,
);

$this->menu=array(
	array('label'=>'List Section', 'url'=>array('index')),
	array('label'=>'Create Section', 'url'=>array('create')),
	array('label'=>'Update Section', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Section', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Section', 'url'=>array('admin')),
);
?>

<h1>View Section #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Title',
		'Description',
		'XOrder',
		'Status',
		'Createdon',
	),
)); ?>
