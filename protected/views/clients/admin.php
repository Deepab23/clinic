

<h1>Manage Clients</h1>



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
