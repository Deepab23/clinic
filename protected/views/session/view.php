<?php

function getClientname($vid){;
	return Clients::model()->findByPk($vid)->FirstName;
}

?>


<h1>View Session</h1>


		
	

<div  class="row" style="margin-left:25px">


<div class="row" style="margin-top:10px;">
		
		   <div class="col-xs-2">
		   <label> Client</label>
		   </div>
		   
		   
		   <div class="col-xs-10">
		   <?php  echo getClientname($model->client_id)  ?>
		   </div>
		   </div>
		   
		   

		   
		   <div class="row" style="margin-top:10px;">
		
		   <div class="col-xs-2">
		     <label> Date</label>
		   </div>
		   
		   
		   <div class="col-xs-10">
		   	   <?php  echo $model->date  ?>
		   </div>
		   </div>
		   
		   
		   
		   <div class="row" style="margin-top:10px;">
		
		   <div class="col-xs-2">
		     <label>Workout</label>
		   </div>
		   
		   
		   <div class="col-xs-10">
		   	   <?php  echo $model->workout  ?>
		   </div>
		   </div>
		   
		   
		   
	
		<div class="row" style="margin-top:10px;">
		
		   <div class="col-xs-2">
		   
		<label>Therapists </label>
		</div>
		
	 <div class="col-xs-10">
		
				<?php
		if(isset($model->id)){
			?>
			
			<table class="table"><thead> <tr>  <th>Therapists Name</th> <th>Time</th>  <th>Action</th>  </tr> </thead> 
			<tbody> 
			<?php
			
				
		$Criteria = new CDbCriteria();
        $Criteria->condition = "session_id=$model->id";
		$fls=SessionTherapist::model()->findAll($Criteria);
			
			foreach($fls as $fl){
				
			
			echo "<tr class='rmclath_$fl->id'> <td>".$this->getUsername($fl->therapist_id)."</td>  <td>$fl->total_time</td>   <td><a href='javascript:void(0)' onclick='dofdeletex($fl->id);return false;' class='delete'> Delete</a></td>  </tr>";
			
			}
			?>
			</tbody>
			</table>
			
			<?php
			
		}
		
		?>
		 <div>


		 
		
		</div>
		
		</div>
	</div>
	
	
	
	
			<div class="row appendhere" style="margin-top:10px;">
			
				 <div class="col-xs-2">
		<label>Notes</label>
		</div>
			 <div class="col-xs-10">
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
		

	</div>

	
	</div>

	
	


		<div class="row" style="margin-top:10px;">
			 <div class="col-xs-2">
		<label>Comments </label>
		
		</div>
		
		
			 <div class="col-xs-10">
	

<div class="row appendcomments" style="margin-top:20px;clear:both;">

<?php
if(isset($model->id)){
$Criteria = new CDbCriteria();
$Criteria->condition = "session_id=$model->id";
$cmts=SessionComment::model()->findAll($Criteria);

foreach($cmts as $cm){

?>

 <div class="media mt25"><a href="#" class="pull-left"> <img alt="..." src=" <?php echo Yii::app()->request->baseUrl; ?>/xassets/img/avatars/images.jpg" class="media-object mn thumbnail thumbnail-sm rounded mw40"> </a><div class="media-body mb5"><h5 class="media-heading mbn"><?php echo $this->getUsername($cm->users_id)  ?> </h5><p> <?php echo $cm->comment  ?> </p></div></div>

<?php
}
}
?>
</div>
		
		</div>
		
			</div>
		
		
	</div>	
		
		
		<style>
		
		
		.table > thead > tr > th {
  border-bottom: 1px solid #c2c2c2 !important;
  font-weight: 600;
  vertical-align: bottom;
}
		</style>
		
