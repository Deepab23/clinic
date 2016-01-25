<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);




function getRole($vid){
	
	if($vid==1){
		return "Executive";
	}else if($vid==2){
		return "Floor	
  Manager";
	}else{
		return "Therapist";
	}
	
}




function getOffice($vid){;
	return Location::model()->findByPk($vid)->name;
}

?>

<h1>Manage Users</h1>



<div class="buttons-preview">
                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/users/create" class="btn btn-success"><i class="fa fa-plus"></i> Add User</a>
                             

                                </div>
								

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'FirstName',
		'LastName',
		'Email',
		'DOH',
			array(
			'name' => 'Office',
			'type' => 'raw',
			'header'=> 'Office',
			'value' => 'CHtml::encode(getOffice($data->Office))'
		),
			
				array(
			'name' => 'Role',
			'type' => 'raw',
			'header'=> 'Role',
			'value' => 'CHtml::encode(getRole($data->Role))'
		),
			
		'Createdon',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
