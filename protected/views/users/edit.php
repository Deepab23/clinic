<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="col-md-6 formleft">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
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

	<div class="form-group">
		<?php echo $form->labelEx($model,'FirstName'); ?>
		<?php echo $form->textField($model,'FirstName',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'FirstName'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'LastName'); ?>
		<?php echo $form->textField($model,'LastName',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'LastName'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Pasword'); ?>
		<?php echo $form->textField($model,'Pasword',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'Pasword'); ?>
	</div>

	
		<div class="form-group">
		<label> Education <label>
		</div>
		
	<div class="form-group label">
	  <?php echo $form->checkBox($model,'EB'); ?>
	<?php echo $form->labelEx($model,'EB'); ?>
  
    <?php echo $form->error($model,'EB'); ?>
	
	&nbsp;
	&nbsp;
	 <?php echo $form->checkBox($model,'EC'); ?>
	<?php echo $form->labelEx($model,'EC'); ?>
   
    <?php echo $form->error($model,'EC'); ?>
&nbsp;
	&nbsp;
 <?php echo $form->checkBox($model,'EE'); ?>
	<?php echo $form->labelEx($model,'EE'); ?>
   
    <?php echo $form->error($model,'EE'); ?>
	</div>


	


	<div class="row buttons">
		

<input type="submit" class="btn  btn-system btn-block" value="SUBMIT">


	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

