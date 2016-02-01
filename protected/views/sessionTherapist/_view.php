<?php
/* @var $this SessionTherapistController */
/* @var $data SessionTherapist */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('session_id')); ?>:</b>
	<?php echo CHtml::encode($data->session_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('therapist_id')); ?>:</b>
	<?php echo CHtml::encode($data->therapist_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_time')); ?>:</b>
	<?php echo CHtml::encode($data->total_time); ?>
	<br />


</div>