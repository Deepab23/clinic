<?php
/* @var $this SessionController */
/* @var $model Session */

$this->breadcrumbs=array(
	'Sessions'=>array('index'),
	'Manage',
);



	


$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'a-grid-id',
    'dataProvider' => $model,
    'ajaxUpdate' => true, //false if you want to reload aentire page (useful if sorting has an effect to other widgets)
    'filter' => null, //if not exist search filters
    'columns' => array(
 
        array(
            'header' => 'View Session',
            'name' => 'id',
			'type'=>'raw',
            'value'=>'CHtml::link("View Session",array("session/view","id"=>$data["id"]))',
			),
        array(
            'header' => 'Client',
            'name' => 'cname'
			),
		
		 array(
            'header' => 'Date',
            'name' => 'date',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
		
		
		 array(
            'header' => 'Workout',
            'name' => 'workout',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
 
        
        array( //we have to change the default url of the button(s)(Yii by default use $data->id.. but $data in our case is an array...)
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'buttons' => array(
                'delete' => array('url' => '$this->grid->controller->createUrl("delete",array("id"=>$data["id"]))'),
				
            ),
        ),
    ),
));