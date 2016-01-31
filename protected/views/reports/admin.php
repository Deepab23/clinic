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
<form method="post" action="">
<div class="col-xs-5">
<label>Therapist’s</label>
<select class="form-control mysetect" name="thrapist">
<option value=''>Select Therapist</option>
<?php
foreach($therep as $trep){
	$selected='';
	if(@$model[0]['tid']==$trep->id){
		$selected='selected';
	}
	echo "<option value='$trep->id' $selected> $trep->FirstName</option>";
}
?>
</select>
<label>Clients</label>

<select class="form-control mysetect" name="Client">
<option value=''>Select Clients</option>
<?php
foreach($theClients as $client){
	$selected='';
	if(@$model[0]['cid']==$client->id){
		$selected='selected';
	}
	echo "<option value='$client->id' $selected> $client->FirstName</option>";
}
?>
</select>
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
<div class="row buttons">
		
<input type="submit" value="Search" class="btn  btn-system">
	</div>
</form>
<h1>Manage Reports</h1>
	<div class="panel-heading">
              <span class="panel-title">
                <span class="fa fa-table"></span>Reports</span>
              <div class="pull-right hidden-xs">
                <code class="mr20"></code>
              </div>
            </div>
            <div class="panel-body pn">
              <div class="bs-component">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Client Name</th>
                      <th>Date of Session</th>
                      <th>Therapist’s Name</th>
					  <th>Hours worked</th>
					  <th>Workout</th>
					  <th>Comments</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
					if(!empty($model)){
						foreach($model as $session){ ?>
					<tr>
                      <td><?php echo $session['FirstName']?>&nbsp;<?php echo $session['FirstName']?></td>
					  <td><?php echo $session['date']?></td>
					  <td><?php echo $session['thFirstName']?>&nbsp;<?php echo $session['thFirstName']?></td>
					  <td><?php echo $session['total_time']?></td>
					  <td><?php echo $session['workout']?></td>
					  <td><button>Comment</button></td>
                    </tr>
					<?php } } ?>
                  </tbody>
                </table>
              <div class="btn btn-primary btn-xs" id="source-button" style="display: none;">&lt; &gt;</div></div>
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
