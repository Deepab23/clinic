<?php
/* @var $this SessionController */
/* @var $model Session */
/* @var $form CActiveForm */
?>


<div class="col-md-7 formleft">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'session-form',
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
		<?php echo $form->labelEx($model,'client_id'); ?>
		<?php 
		$val="";
		if(isset($model->client_id)){
		$c=Clients::model()->findByPk($model->client_id);
		$val=$c->FirstName." ".$c->LastName;
		}
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	'name'=>'client_id',
	'value'=>$val,
//	'source'=>$people, // <- use this for pre-set array of values
	'source'=>Yii::app()->request->baseUrl.'/site/getNames',// <- path to controller which returns dynamic data
	// additional javascript options for the autocomplete plugin
	'options'=>array(
		'minLength'=>'1', // min chars to start search
		'select'=>'js:function(event, ui) {
			$("#setclientval").val(ui.item.id);
			console.log(ui.item.id +":"+ui.item.value); }'
	),
	'htmlOptions'=>array(
		'id'=>'person',
		'rel'=>'val',
		'class'=>'form-control'
	),
));
		?>
		<input type="hidden" name="Session[client_id]" id="setclientval">
		<?php echo $form->error($model,'client_id'); ?>
	</div>
	
	
	
			<div class="row appendhere" style="margin:10px 0;">
		<label>Notes</label>
		
		<?php
		if(isset($model->id)){
			?>
			
			<table class="table"><thead> <tr>  <th>File Name</th> <th>Description</th> <th>Date</th> <th>Action</th>  </tr> </thead> 
			<tbody> 
			<?php
			
				
		$Criteria = new CDbCriteria();
        $Criteria->condition = "session_id=$model->id";
		$fls=SessionNotes::model()->findAll($Criteria);
			
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

	
	

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		
				<div>
		
		<?php 
		if(isset($model->date)){
			$val=$model->date;
		}else{
			$val=Date('Y-m-d');
		}
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'Session[date]',
	'model'=>$model,
	'value'=>$val,
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
    ),
    'htmlOptions'=>array(
        'class'=>'form-control'
    ),
));

?>
</div>

		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'workout'); ?>
		<?php echo $form->textArea($model,'workout',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'workout'); ?>
	</div>



	<div class="row buttons">
		
<input type="submit" class="btn  btn-system btn-block" value="SUBMIT">
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>

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
		url:'<?php echo Yii::app()->request->baseUrl?>/sessionNotes/delete/'+id,
		success:function(data){
			$(".rmcla_"+id).remove();
		}
	})
	
		}
		
		return false;
}

</script>