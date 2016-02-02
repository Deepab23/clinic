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

<h1>Manage Therapists</h1>



<div class="buttons-preview">
                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/users/create" class="btn btn-success"><i class="fa fa-plus"></i> Add NEW Therapists</a>
                             

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
			'name' => 'EE',
			'type' => 'raw',
			'header'=> 'View Sessioss',
			'value' => 'CHtml::link("View Sessions",Yii::app()->createUrl("session/therapist",array("id"=>$data->id)))'
			
     
		),
			
		'Createdon',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
