<?php
/* @var $this SessionTherapistController */
/* @var $model SessionTherapist */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'session-therapist-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'session_id'); ?>
		<?php echo $form->textField($model,'session_id'); ?>
		<?php echo $form->error($model,'session_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'therapist_id'); ?>
		<?php echo $form->textField($model,'therapist_id'); ?>
		<?php echo $form->error($model,'therapist_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_time'); ?>
		<?php echo $form->textField($model,'total_time',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'total_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->