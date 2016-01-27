

<h1>Manage Clients</h1>


<div class="buttons-preview">
                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/clients/create" class="btn btn-success"><i class="fa fa-plus"></i> Add Client</a>
                             

                                </div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'clients-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'FirstName',
		'LastName',
		'location',
		'theripiest',
		'phone',
		/*
		'email',
		'address',
		'gender',
		'dob',
		'inurancecompany',
		'injurydate',
		'therapy_start_date',
		'ASIA',
		'injury',
		'medication',
		'notes',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
