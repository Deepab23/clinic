
<h1>Manage Sessions</h1>



<div class="buttons-preview">
                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/session/create" class="btn btn-success"><i class="fa fa-plus"></i> Add Session</a>
                             

                                </div>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'session-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'client_id',
		'date',
		'workout',
		'createdon',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
