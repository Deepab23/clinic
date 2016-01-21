



<div style="margin:2% 30%">
<div class="col-lg-10 col-sm-10 col-xs-12">
                                            <div class="widget flat radius-bordered">
                                                <div class="widget-header bg-info">
                                                    <span class="widget-caption">Create Project</span>
                                                </div>
                                                <div class="widget-body">
                                                    <div id="registration-form">
                                                        <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'section-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model); ?>
                                                            <div class="form-title">
                                                             Create Project
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail2">Title</label>
                                                                        <span class="input-icon icon-right">
                                                                            <input name="Project[Title]" type="text" placeholder="Project Name" id="exampleInputEmail2" class="form-control">
                                                                           
                                                                        </span>
																			<?php echo $form->error($model,'Title'); ?>
                                                                    </div>
                                                                </div>
                                                              
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail2">Description</label>
                                                                        <span class="input-icon icon-right">
                                                                            <textarea name="Project[Description]" rows="10" class="form-control"></textarea>
                                                                          
                                                                        </span>
																			<?php echo $form->error($model,'Description'); ?>
                                                                        <p class="help-block">Your description will be in this text area.</p>
                                                                    </div>

                                                                </div>
                                                            </div>
															<input type="hidden" name="Project[UserId]" value="<?php echo Yii::app()->user->id ;?>"> 
                                                            <button class="btn btn-success btn-block" type="submit">Submit</button>
                                                      <?php $this->endWidget(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										</div>