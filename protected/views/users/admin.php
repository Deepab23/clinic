<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);




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
		'Education',
		'DOH',
		'Office',
		'Role',
		'Createdon',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
