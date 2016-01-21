<h1>Projects</h1>
<br>

<div class="row" style="margin-left:5%">


								
								
								<?php
								$uid=Yii::app()->user->id;
								$criteria=new CDbCriteria;
								$criteria->condition="UserId=$uid";
								$proj=Project::model()->findAll($criteria);
								foreach($proj as $pr){
									
								
								?>
								
								  <div class="col-lg-3 col-sm-6 col-xs-12" onclick="newprojectwizard()">
								
								
                                    <div class="databox databox-xxlg radius-bordered databox-shadowed databox-vertical databox-graded">
                                        <div class="databox-top bordered-bottom-2 bordered-orange">
                                            <div class="col-lg-12 col-sm-12 col-xs-12 text-align-left">
                                             <h3 class="tophead"><?php echo  $pr->Title ?> </h3>
                                            </div>
                                            
                                        </div>
										<div style="text-align:left;padding:5px 10px;height: 215px;">
										<h5> 
										Click GET STARTED below to start the process.
										</h5>
										<div style="text-align:center;margin-top:20px;">
									  <a class="btn btn-success btn-lg" href="<?php echo Yii::app()->request->baseUrl; ?>/questions/create/<?php echo $pr->id ?>"></i>GET STARTED</a>
									  </div>
										 </div>
									<div  class="btn btn-blue  btn-block">
										 
										  <a href="<?php echo Yii::app()->request->baseUrl; ?>/questions/view/<?php echo $pr->id ?>" > <i class="fa fa-eye fa-2" > </i>View Details</a>  
										  
										  <a  href="<?php echo Yii::app()->request->baseUrl; ?>/questions/create/<?php echo $pr->id ?>"> <i class="fa fa-pencil-square-o fa-2" > </i> Edit Details</a>
										  </div>
                                   </div>
								  
								  
                                </div>
								
								
								
								
								<?php

								}
								?>
								
                               
							
                            </div>

							
							<script>
							
							function newproject(){
								
								window.location.href="<?php echo Yii::app()->request->baseUrl; ?>/project/create"
							}
							localStorage.itemid='sxdfrt670';
							</script>
							
							<style>
							
							.databox-graded div.btn.btn-blue.btn-block a{
								color:#fff;
								font-weight:bold;
								margin-right:50px
								
							}
							
							.btn.btn-blue.btn-block{
								text-align:left;
								padding: 7px 12px;
								border-radius:0;
							}
							</style>