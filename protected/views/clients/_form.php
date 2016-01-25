<?php
/* @var $this ClientsController */
/* @var $model Clients */
/* @var $form CActiveForm */
?>

<div class="col-md-7 formleft">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clients-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,

		'htmlOptions'=>array(
                          'class'=>'form-horizontal',
						  	'enctype' => 'multipart/form-data',
                        )
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'FirstName'); ?>
		<?php echo $form->textField($model,'FirstName',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'FirstName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LastName'); ?>
		<?php echo $form->textField($model,'LastName',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'LastName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
	<select id="Clients_location" name="Clients[location]" class="form-control" onchange="gettheripiest(this.value)">
    <option value="">Select location</option>
	<?php
	if($_SESSION['user']['Role']==1){
		
		$loc=Location::model()->findAll();
	}else{
		$plc=$_SESSION['user']['Office'];
		$Criteria = new CDbCriteria();
        $Criteria->condition = "id=$plc";
		$loc=Location::model()->findAll($Criteria);
	}
	
	foreach($loc as $l){
		
		echo "<option value='$l->id'> $l->name </option> ";
		
	}
	
	?>

</select>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
	<?php echo $form->labelEx($model,'theripiest'); ?>
	<select id="Clients_theripiest" name="Clients[theripiest]" class="form-control">
	
	<select>
		<?php echo $form->error($model,'theripiest'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>60,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php 
		$role=array('male'=>'Male','female'=>'Female');
		echo $form->dropDownList($model,'gender',$role,array('class'=>'form-control'));?>
		

		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dob'); ?>
		<?php echo $form->textField($model,'dob',array('size'=>60,'maxlength'=>60,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inurancecompany'); ?>
		<?php echo $form->textField($model,'inurancecompany',array('size'=>60,'maxlength'=>60,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'inurancecompany'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'injurydate'); ?>
		<div>
		
		<?php 
		
		
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'Clients[injurydate]',
	'model'=>$model,
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
    ),
    'htmlOptions'=>array(
        'class'=>'form-control',
		'value'=>$model->injurydate
    ),
));

?>
</div>
		<?php echo $form->error($model,'injurydate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'therapy_start_date'); ?>
		<div>
		
		<?php 
	
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'Clients[therapy_start_date]',
	'model'=>$model,
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
    ),
    'htmlOptions'=>array(
        'class'=>'form-control',
		
		
    ),
));

?>
</div>
		<?php echo $form->error($model,'therapy_start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ASIA'); ?>
		<?php 
		$role=array('A'=>'A','B'=>'B','C'=>'C','D'=>'D','E'=>'E','F'=>'F');
		echo $form->dropDownList($model,'ASIA',$role,array('class'=>'form-control'));?>
		<?php echo $form->error($model,'ASIA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'injury'); ?>
		<div>
		<?php echo $form->radioButtonList($model,'injury',array('1'=>'Complete','2'=>'In Complete')); ?>
				</div>

		<?php echo $form->error($model,'injury'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'medication'); ?>
		<?php echo $form->textArea($model,'medication',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'medication'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div>
	
		<div class="row appendhere" style="margin:10px 0;">
		<label>Assessments</label>
		
		<?php
		if(isset($model->id)){
			?>
			
			<table class="table"><thead> <tr>  <th>File Name</th> <th>Description</th> <th>Date</th> <th>Action</th>  </tr> </thead> 
			<tbody> 
			<?php
			
				
		$Criteria = new CDbCriteria();
        $Criteria->condition = "client_id=$model->id";
		$fls=ClientAssessments::model()->findAll($Criteria);
			
			foreach($fls as $fl){
				
			
			echo "<tr class='rmcla_$fl->id'> <td>$fl->url</td>  <td>$fl->description</td>  <td>$fl->date</td>  <td><a href='javascript:void(0)' onclick='dofdelete($fl->id);return false;' class='delete'> Delete</a></td>  </tr>";
			
			}
			?>
			</tbody>
			</table>
			
			<?php
			
		}
		
		?>
		
		<div class="row clone" style="clear:both">
                      
                      <div class="col-xs-3">
                      <div class="fileUpload btn btn-primary"><span>Select file</span>  
<input type="file" name="afiles[]" class="upload" onchange="dochange(this)"></div>

<label class="filename"></label>

                      </div>
                      <div class="col-xs-7">
                        <textarea name="afilesdesc[]" style="height: 39px;" class="form-control" placeholder="Enter Description" ></textarea>
                      </div>
                      <div class="col-xs-2">
                        <input type="button"  value="Add More" onclick="addmoreclone()" class="btn btn-success">
                      </div>
                    </div>
	</div>

	<div class="row buttons">
		<input type="submit" class="btn  btn-system btn-block" value="SUBMIT">
	</div>

<?php $this->endWidget(); ?>

<div style="height:10px;clear:both">

</div><!-- form -->

</div><!-- form -->
<script>

<?php

if(isset($model->id)){
	?>
	
	
$("#Clients_location").val('<?php echo $model->location ?>').change()
$("#Clients_therapy_start_date").val('<?php echo $model->therapy_start_date ?>')
$("#Clients_injurydate").val('<?php echo $model->injurydate ?>')
	

	<?php
	
}


?>
function gettheripiest(val){
	$.ajax({
		url:'<?php echo Yii::app()->request->baseUrl;  ?>/users/gettharepistbyloc',
		type:'post',
		data:{location:val},
		success:function(data){
			
			$("#Clients_theripiest").html(data)
			
			setTimeout(function(){
				<?php
				
				if(isset($model->id)){
	?>
	$("#Clients_theripiest").val('<?php echo $model->theripiest ?>');
	
				<?php  } ?>
			},200)
		}
	})
}

function addmoreclone(){
	
	var htmln='<div class="row clone" style="clear:both;margin-top:10px"><div class="col-xs-3"><div class="fileUpload btn btn-primary"><span>Select file</span><input type="file" name="afiles[]" onchange="dochange(this)" class="upload"> <label class="filename"></label> </div></div><div class="col-xs-7"><textarea name="afilesdesc[]" class="form-control" placeholder="Enter Description" style="height: 39px;"  ></textarea></div><div class="col-xs-2"><input type="button"  value="Remove" onclick="removeme(this)" class="btn btn-danger"></div></div>';
	
	$(".appendhere").append(htmln);

}

function removeme(th){
	
	$(th).parent().parent().remove();
}


function dochange(th){
	$(th).parent().next().text(th.value);

	
}

function dofdelete(id){
	
	if(confirm("Are you sure to delete!")){
		

	
	$.ajax({
		url:'<?php echo Yii::app()->request->baseUrl?>/clientAssessments/delete/'+id,
		success:function(data){
			$(".rmcla_"+id).remove();
		}
	})
	
		}
		
		return false;
}
</script>