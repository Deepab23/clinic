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
			 
			 return $ans->Answer;
		 }else{
			 return "";
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

 <!-- Loading Container -->
    <div class="loading-container">
        <div class="loader"></div>
    </div>
    <!--  /Loading Container -->
	
<div class="container">

	<div class="row">
			<aside class="col-sm-8">
					<section id="wizard">
			<div id="bar" class="progress">
                                 <div  class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
    0% </div>
	</div>
				<form id="commentForm" method="post"  class="form-horizontal" enctype="multipart/form-data" action="<?php echo Yii::app()->request->baseUrl; ?>/questions/create/<?php echo $pid; ?>">
				<input type="hidden" value="<?php echo $pid; ?>" name="projid" id="projid" >
				<div id="rootwizard">
					<ul>
					<?php
					$criteria=new CDbCriteria;
					$criteria->order="XOrder";
					$steps=Section::model()->findAll($criteria);
					foreach($steps as $step){
						
						if(checkQuestion($step->Id)){
					?>
					  	<li><a href="#tab<?php echo $step->Id ?>"  id="xtab<?php echo $step->Id ?>"  data-toggle="tab"><?php echo $step->Title ?></a></li>
						<?php
						}
						}
					?>
					</ul>   
					<div class="tab-content">
						<?php
					$criteria=new CDbCriteria;
					$criteria->order="XOrder";
					$steps=Section::model()->findAll($criteria);
					foreach($steps as $step){
						if(checkQuestion($step->Id)){
						?>
					    <div class="tab-pane" id="tab<?php echo $step->Id ?>">
						
					    	<?php
							$criteria=new CDbCriteria;
        $criteria->condition="section=$step->Id";
			$criteria->order="sort_order";
							$quest=Questions::model()->findAll($criteria);
							foreach($quest as $qu){

                             $req="";
							 if($qu->Required==1){
								 $req="required";
							 }
							 $x=getansersx($qu->Id,$step->Id,$pid);
							 if(!empty($x) && $qu->Type==3){
								  $req="";
							 }
							?>
							                                            <div class="form-group">
                                                                        <label  style="width:100%;font-weight:600;"><?php echo ucfirst($qu->Title) ?></label>
                                                                       <?php
																if($qu->Type==1){
																		   
																	?>
																	<input name="answer_<?php echo $qu->Id.'_'.$step->Id.'_'.$pid ?>" type="text"  value="<?php echo getansers($qu->Id,$step->Id,$pid) ?>" class="form-control <?php echo $req ?>" placeholder="<?php echo $qu->helptext ?>">
																	<?php
																	}
																	else if($qu->Type==2){

																	?>
																	 <textarea name="answer_<?php echo $qu->Id.'_'.$step->Id.'_'.$pid ?>"  rows="8" class="form-control <?php echo $req ?>" placeholder="<?php echo $qu->helptext ?>"><?php echo getansers($qu->Id,$step->Id,$pid) ?></textarea>
																	<?php
																	}	

																	else if($qu->Type==3){

																	?>
																	<input name="answer_<?php echo $qu->Id.'_'.$step->Id.'_'.$pid ?>[]"  multiple  type="file" class="<?php echo $req ?>">
																	<?php
																	}		

																	else if($qu->Type==4){
                                                                     $op=explode(',',$qu->Description);
																	 foreach($op as $oo){
																		 $xc=getansers($qu->Id,$step->Id,$pid);
																		 $xc=trim($xc);
																		 $oo=trim($oo);
																		 $checked="";
																		 if($xc==$oo){
																			   $checked="checked='checked'";
																		 }
																	?>
																	
																	<div class="checkbox">
																	
																		<label style="width:100%"><input <?php echo $checked; ?> type="radio" name="answer_<?php echo $qu->Id.'_'.$step->Id.'_'.$pid ?>" class="<?php echo $req ?>" value="<?php echo $oo; ?> "><?php echo $oo; ?> </label>
																		</div>	
																	<?php
																	$req ="";
																	 }
																	}	

																	else if($qu->Type==5){
																		$checked="";
																		$op=explode(',',$qu->Description);
																	 foreach($op as $oo){
																		 $checked="";
																		  $oo=trim($oo);
																		  $xc=getansers($qu->Id,$step->Id,$pid);
																		   $xc=explode(",",$xc);
																		   if(is_array($xc)){
																			 $result = array_map('trim', $xc);
																			 $found = array_search($oo,$result);
																			   
                                                                               if($found !== false){
																				    $checked="checked";
																			   }
																		   }else{
																		$xc=trim($xc);
																		 $oo=trim($oo);
																		 $checked="";
																		 if($xc==$oo){
																			   $checked="checked";
																		 }
																		   }
                                                                     ?>
																		<div class="checkbox">
																		<label style="width:100%"><input   type="checkbox" name="answer_<?php echo $qu->Id.'_'.$step->Id.'_'.$pid  ?>[]" class="<?php echo $req.' '.$checked ?>" value="<?php echo $oo; ?>"><?php echo $oo; ?> </label>
																		</div>			
																	<?php
																	$req ="";
																	 }
																	}																			   
																	?>
																		
                                                                    </div>
																	
																	<?php
																	
																	}
							?>
					  </div>
					  
<?php
					}
					}
?>
						<ul class="pager wizard">
							<li class="previous first" style="display:none;"><a href="#">First</a></li>
							<li class="previous"><a href="#">Previous</a></li>
							<li class="next last" style="display:none;"><a href="#">Last</a></li>
						  	<li class="next"><a href="#">SAVE AND NEXT</a></li>
							<li class="finish"><a href="javascript:;" onclick="doupdate();" > SAVE AND SUBMIT</a></li>
						</ul>
					</div>
				</div>
				</form>
</section>

	
			</aside>
			<aside class="col-sm-4 domain_right_side">
			
								<?php
					//$steps=Section::model()->findAll();
					
						$criteria=new CDbCriteria;
					$criteria->order="XOrder";
					$steps=Section::model()->findAll($criteria);
					foreach($steps as $step){
						
						if(checkQuestion($step->Id)){
					?>
					  	
					
			<div class="resource_<?php echo $step->Id ?> whelp">
				<div class="white_box">
					<video id="rvideos" width="100%" height="240" poster="<?php echo Yii::app()->request->baseUrl; ?>/images/watch_video.jpg" controls>
					<source src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/images/<?php echo $step->Video ?>" type="video/mp4">
					</video>	
				</div>
				
				<?php
				if(!empty($step->Resource)){
					?>
				<div class="white_box">
					<h3>Resource </h3>
					<?php echo $step->Resource ?>
				</div>
				<?php
				}
				?>
				
				</div>
				<?php
						}
						}
					?>
			</aside>
		</div>
		


			</div>
	

	


	<script>
	
	function doupdate(){
		$("#projid").val('0');
  
		var $valid = $("#commentForm").valid();
	  			if(!$valid) {
	  				
	  				return false;
	  			}
				
						$("#commentForm").submit();
				
			bootbox.alert("GREAT JOB! Your profile is being created and all your content is being uploaded. Depending on the amount of content it can take 1-5 minutes to load. Please do not close your browser or hit the back button.")
	}
	$(document).ready(function() {
		$(".whelp").hide();
		var $validator = $("#commentForm").validate();
	  	$('#rootwizard').bootstrapWizard({
	  		'tabClass': 'nav nav-pills',
			excluded: ':disabled',
			'onTabShow': function(tab, navigation, index) {
			$(".whelp").hide();
			var $total = navigation.find('li').length;
			var $current = index+1;
			$(".whelp:nth-child("+$current+")" ).show();
			var $percent = ($current/$total) * 100;
			$percent=$percent.toFixed(2); 
			$('.progress-bar').css({width:$percent+'%'}).text($percent+'%');
		},
	  		'onNext': function(tab, navigation, index) {
	  			var $valid = $("#commentForm").valid();
	  			if(!$valid) {
	  				
	  				return false;
	  			}
				localStorage.itemid=$('ul.nav.nav-pills li.active').next('li').children('a').attr('id');
				
				//alert($valid);
				$("#commentForm")[0].submit();
				 $('#commentForm').unbind().submit(); 
				
				var vid = document.getElementById("rvideos");
                   vid.pause();

				bootbox.alert('Please wait while saving.')
				//return false;
				
			var $total = navigation.find('li').length;
			var $current = index+1;
			var $percent = ($current/$total) * 100;
			$percent=$percent.toFixed(2); 
			$('.progress-bar').css({width:$percent+'%'}).text($percent+'%');
	  		}
	  	});
		
		var $total = $(".tab-content").find('.tab-pane').length;
			var $current = 1;
			var $percent = ($current/$total) * 100;
			$percent=$percent.toFixed(2); 
			$('.progress-bar').css({width:$percent+'%'}).text($percent+'%');
			
			
			
            
			setTimeout(function(){
				$("#"+localStorage.itemid).click();
				$(".loading-container").hide();
			},1000);
		
	});
	
	
	$(window).load(function(){
		setTimeout(function(){
			$('.checked').click();
		},1000)

		
		
	})
	</script>
	
	<style>

.error {
  color: red;
  display: block;
  font-size: 11px;
  font-weight: normal;
  width: 400px !important;
}

.wizard {
    box-shadow:none;
}

 ul.pager.wizard li.next a{
	 
	 background-color: #399A5E !important;
    border-color: #399A5E !important;
    color: #fff;
	   font-size: 17px;
    font-weight: 600;
    padding: 5px 15px;
    text-transform: uppercase;
 }
 
 ul.pager.wizard li.finish a{
	 
	 background-color: #399A5E !important;
    border-color: #399A5E !important;
    color: #fff;
	   font-size: 17px;
    font-weight: 600;
    padding: 5px 15px;
    text-transform: uppercase;
	float: right;
 }
 
ul.pager.wizard li.previous a{
	
	background-color: #2B6FAF !important;
    border-color: #2B6FAF;
    opacity: 0.5;
	color: #fff;
	   font-size: 17px;
    font-weight: 600;
    padding: 5px 15px;
    text-transform: uppercase;
}

.tab-content {
  background-color: #fbfbfb;
  box-shadow: none;
  padding: 18px 40px;
  position: relative;
}

 ul.nav.nav-pills li{
	
	height:0px;
 }
 ul.nav.nav-pills li.active{
	 display:block;
	 width:100%;
	 height:40px;
 }
 
 
 input[type="checkbox"], input[type="radio"] {
  cursor: pointer;
  height: 18px;
  left: 0;
  opacity: 1;
  position: absolute;
  width: 18px;
  z-index: 12;
 }
  
  input[type="radio"] {
  cursor: pointer;
  height: 18px;
  left: -20px !important;
  opacity: 1;
  position: absolute;
  width: 18px;
  z-index: 12;
}

input[type="checkbox"], input[type="radio"] {
  line-height: normal;
  margin: 1px 0 0;
}

.form-horizontal .checkbox, .form-horizontal .checkbox-inline, .form-horizontal .radio, .form-horizontal .radio-inline {
  margin-bottom: 0;
  margin-left: 30px;
  margin-top: 0;
  padding-top: 7px;
}

.nav-pills > li > a {
  border-radius:0;
}

.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
  background-color: #337ab7;
  color: #fff;
 font-size: 19px;
    font-weight: normal;
  text-transform: uppercase;
}
ul{
	list-style:none;
	
}

li{
	list-style:none;
	
}
	</style>
	