<?php
/* @var $this LocationController */
/* @var $model Location */
/* @var $form CActiveForm */
?>

<div class="col-md-6 formleft">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'location-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
                          'class'=>'form-horizontal',
                        )
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'class'=>'form-control')) ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
		<div class="row">
		</div>
<br>
	<div class="row buttons">
		
<input type="submit" class="btn  btn-system btn-block" value="SUBMIT">
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->