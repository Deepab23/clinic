<?php
function checkQuestion($sid){
	
	
		$criteria=new CDbCriteria;
        $criteria->condition="section=$sid";
		return Questions::model()->count($criteria);
	
}



function getansers($questionid,$sid,$projectid){
	
	$criteria=new CDbCriteria;
        $criteria->condition="sectionid=$sid and questionid=$questionid and  projectid=$projectid";
		 $ans=Answers::model()->find($criteria);
		 
		 if($ans){
			 
			 print_r($ans->Answer);
		 }else{
			 echo "---";
		 }
}

function getansersx($questionid,$sid,$projectid){
	
	$criteria=new CDbCriteria;
        $criteria->condition="sectionid=$sid and questionid=$questionid and  projectid=$projectid";
		 $ans=Answers::model()->find($criteria);
		 
		 if($ans){
			 
			 return$ans->Answer;
		 }
}

?>


<div style="margin: 10px auto;width: 700px;">
			<?php
			
			$criteria=new CDbCriteria;
					$criteria->order="XOrder";
					$steps=Section::model()->findAll($criteria);
					
			
					foreach($steps as $step){
						if(checkQuestion($step->Id)){
						?>
					    
						<h3><?php echo $step->Title ?>  </h3>
						
							
					    	<?php
							$criteria=new CDbCriteria;
                            $criteria->condition="section=$step->Id";
							$quest=Questions::model()->findAll($criteria);
							foreach($quest as $qu){

                             $req="";
							 if($qu->Type==3){
								$ans= getansersx($qu->Id,$step->Id,$pid);
								$as=explode(",",$ans);
								foreach($as as $aj){
									if(empty($aj))
									continue;
								 $req.=" &nbsp;&nbsp; <a download href='".Yii::app()->request->baseUrl."/uploads/images/".$aj."'><i class='fa fa-download'> </i> Downalod</a>";
								}
							 }
							?>
							                                            <div class="form-group">
                                                                        <label for="exampleInputEmail2" style="width:100%;font-weight:600;">
																		<span class="circle" > Q </span> <?php echo ucfirst($qu->Title) ?>?</label>
																		
																		<p> <span class="acircle" > A </span> <?php 
																		if($qu->Type!=3){
																		getansers($qu->Id,$step->Id,$pid);
																		}
																		?>  <?php echo $req ?> </p>

                                                                    </div>
																	
																	<?php
																	
																	}
							?>
					  
					  
<?php
					}
					}
?>
						
	
<div>

<script>
function doredirects(xx){
	localStorage.itemid='xtab'+xx;
	window.location.href='<?php echo Yii::app()->request->baseUrl?>/questions/create/<?php echo $pid ?>'
}
</script>

<style>

.circle {
  background: #d9534f;
  border-radius: 37px;
  color: #fff;
  display: inline-block;
  font-size: 16px;
  font-weight: bolder;
  height: 35px;
  padding: 7px 12px;
  width: 35px;
}

.acircle {
  background: #399A5E;
  border-radius: 37px;
  color: #fff;
  display: inline-block;
  font-size: 16px;
  font-weight: bolder;
  height: 35px;
  padding: 7px 12px;
  width: 35px;
}

.form-group {
  margin-bottom: 35px;
}
</style>
	