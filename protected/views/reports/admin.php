<?php
/* @var $this SessionController */
/* @var $model Session */
//echo "<pre>";print_r($model);die;

		$Criteria = new CDbCriteria();
        $Criteria->condition = "Role=3";
		$therep=Users::model()->findAll($Criteria);
		$Criteria = new CDbCriteria();
		$theClients=Clients::model()->findAll($Criteria);
?>

<h1>Manage Reports</h1>
<br>
<br>

<fieldset class="fsStyle">


					<legend class="legendStyle">
                      <a data-toggle="collapse" data-target="#demo" href="#">Filter Reports</a>
					</legend>
					
<form method="post" action="">
<div class="row">


			
				
				
					
 <div class="col-xs-3">
<label>Therapist’s</label>
<select class="form-control mysetect" name="thrapist[]" multiple>
<option value=''>Select Therapist</option>
<?php
foreach($therep as $trep){
	$selected='';
	
	if(in_array($trep->id, @$model[0]['tid'])){
		$selected='selected';
	}
	echo "<option value='$trep->id' $selected> $trep->FirstName</option>";
}
?>
</select>
</div>

 <div class="col-xs-3">
<label>Clients</label>

<select class="form-control mysetect" name="Client[]" multiple>
<option value=''>Select Clients</option>
<?php
foreach($theClients as $client){
	$selected='';
	if(in_array($client->id, @$model[0]['cid'])){
		$selected='selected';
	}
	echo "<option value='$client->id' $selected> $client->FirstName</option>";
}
?>
</select>
</div>


 
 <div class="col-xs-3">
<label>Start date</label>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'Start',
	'model'=>'',
	'value'=>@$model[0]['start'],
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
    ),
    'htmlOptions'=>array(
        'class'=>'form-control'
    ),
));?>

 </div>
 
 
 <div class="col-xs-3">
 
<label>End date</label>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'end',
	'model'=>'',
	'value'=>@$model[0]['end'],
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

 
</div>
<div class="row buttons" style="float: right;
    margin-right: 3px;">
		
<input type="submit" value="Search" class="btn  btn-system">
	</div>
	<br>
	
	<br>
</form>
 </fieldset>
<?php

?>

<div style="float:right;width:100px; margin-right: 3px;"> <form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/reports/pdf"> 
<input type="hidden" id="pdfforhtml" name="pdfforhtml"> 
<button type="submit" class="btn  btn-system"> <i class="fa fa-file-pdf-o"></i>
 Export PDF </button> </form> </div>
 <div class="gethtmls">
<h3>Total Records:<?php echo (!empty($model[0]['id']))?count(@$model):'0'?></h3>
<h3>Total Hours:<span class='total_hours'>0</span></h3>

	<div class="panel-heading">
              <span class="panel-title">
                <span class="fa fa-table"></span>Sessions</span>
              <div class="pull-right hidden-xs">
                <code class="mr20"></code>
              </div>
            </div>
            <div class="panel-body pn">
              <div class="bs-component">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th width="15%">Client Name</th>
                      <th width="10%">Date of Session</th>
                      <th width="15%">Therapist’s Name</th>
					  <th width="10%">Hours worked</th>
					  <th width="25%">Workout</th>
					  <th width="25%">Comments</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
					if(!empty($model[0])){
						//die('ddd');
						$total_time=0;
						foreach($model as $session){ 
							 $total_time+=$session['total_time'];
						?>
					<tr>
                      <td><?php echo $session['FirstName']?>&nbsp;<?php echo $session['LastName']?></td>
					  <td><?php echo $session['date']?></td>
					  <td><?php echo $session['thFirstName']?>&nbsp;<?php echo $session['thLastName']?></td>
					  <td><?php echo $session['total_time']?></td>
					  <td><?php echo $session['workout']?></td>
					  <td>
							<?php 
							 $id=$session['id'];
							 if(!empty($id)){
							$Criterias = new CDbCriteria();
									$Criterias->condition = "session_id=$id";
									$cmts=SessionComment::model()->findAll($Criterias);
									//echo "<pre>";print_r($cmts);
									foreach($cmts as $cm){ 
									
									
									?>
										
										
										<div class="media mt25"><div class="media-body mb5"><h5 class="media-heading mbn"><?php echo $this->getUsername($cm->users_id)  ?> </h5><p> <?php echo $cm->comment  ?> </p></div></div>
										
									<?php } }?>
									
							 
					  </td>
                    </tr>
					<?php } } ?>
                  </tbody>
                </table>
              <div class="btn btn-primary btn-xs" id="source-button" style="display: none;">&lt; &gt;</div></div>
            </div>
			 </div>
			

  <style>

.select2-container .select2-selection--single {
  box-sizing: border-box;
  cursor: pointer;
  display: block;
  height: 38px !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
  color: #444;
  line-height: 35px !important;
}

</style>
<script>
$(function(){
	$(".total_hours").text(<?php echo $total_time?>);
	
	
});

$(window).load(function(){
	//alert($(".gethtmls").html())
	$("#pdfforhtml").val($(".gethtmls").html())
})
</script>
