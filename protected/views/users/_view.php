<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FirstName')); ?>:</b>
	<?php echo CHtml::encode($data->FirstName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LastName')); ?>:</b>
	<?php echo CHtml::encode($data->LastName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pasword')); ?>:</b>
	<?php echo CHtml::encode($data->Pasword); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Education')); ?>:</b>
	<?php echo CHtml::encode($data->Education); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DOH')); ?>:</b>
	<?php echo CHtml::encode($data->DOH); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Office')); ?>:</b>
	<?php echo CHtml::encode($data->Office); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Role')); ?>:</b>
	<?php echo CHtml::encode($data->Role); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('About')); ?>:</b>
	<?php echo CHtml::encode($data->About); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Createdon')); ?>:</b>
	<?php echo CHtml::encode($data->Createdon); ?>
	<br />

	*/ ?>

</div>