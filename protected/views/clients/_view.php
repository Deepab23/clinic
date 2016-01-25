<?php
/* @var $this ClientsController */
/* @var $data Clients */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('theripiest')); ?>:</b>
	<?php echo CHtml::encode($data->theripiest); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dob')); ?>:</b>
	<?php echo CHtml::encode($data->dob); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inurancecompany')); ?>:</b>
	<?php echo CHtml::encode($data->inurancecompany); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('injurydate')); ?>:</b>
	<?php echo CHtml::encode($data->injurydate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('therapy_start_date')); ?>:</b>
	<?php echo CHtml::encode($data->therapy_start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ASIA')); ?>:</b>
	<?php echo CHtml::encode($data->ASIA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('injury')); ?>:</b>
	<?php echo CHtml::encode($data->injury); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('medication')); ?>:</b>
	<?php echo CHtml::encode($data->medication); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	*/ ?>

</div>