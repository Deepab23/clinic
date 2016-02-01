<?php
/* @var $this SessionTherapistController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Session Therapists',
);

$this->menu=array(
	array('label'=>'Create SessionTherapist', 'url'=>array('create')),
	array('label'=>'Manage SessionTherapist', 'url'=>array('admin')),
);
?>

<h1>Session Therapists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
