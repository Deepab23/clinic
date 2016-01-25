
<h1>View Clients #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'FirstName',
		'LastName',
		'location',
		'theripiest',
		'phone',
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
	),
)); ?>
