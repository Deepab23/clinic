<?php
/* @var $this SessionTherapistController */
/* @var $model SessionTherapist */

$this->breadcrumbs=array(
	'Session Therapists'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SessionTherapist', 'url'=>array('index')),
	array('label'=>'Create SessionTherapist', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#session-therapist-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Session Therapists</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'session-therapist-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'session_id',
		'therapist_id',
		'total_time',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
