 <style>
 #sidebar_left{
	 display:none;
 }
 </style>
 <div class="admin-form theme-info mw500" id="login" style="margin-left: 17%;">

         

          <!-- Login Panel/Form -->
          <div class="panel mt30 mb25">

             
            <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

              <div class="panel-body bg-light p25 pb15">

                <!-- Username Input -->
                <div class="section">
                  <label for="username" class="field-label text-muted fs18 mb10">Username</label>
                  <label for="username" class="field prepend-icon">
                    <input type="text" name="LoginForm[username]" id="username" class="gui-input" placeholder="Enter username">
                    <label for="username" class="field-icon">
                      <i class="fa fa-user"></i>
                    </label>
                  </label>
				  <?php echo $form->error($model,'username'); ?>
                </div>

                <!-- Password Input -->
                <div class="section">
                  <label for="username" class="field-label text-muted fs18 mb10">Password</label>
                  <label for="password" class="field prepend-icon">
                    <input type="password" name="LoginForm[password]" id="password" class="gui-input" placeholder="Enter password">
                    <label for="password" class="field-icon">
                      <i class="fa fa-lock"></i>
                    </label>
                  </label>
				  <?php echo $form->error($model,'password'); ?>
                </div>
              </div>

              <div class="panel-footer clearfix">
                <button type="submit" class="button btn-primary mr10 pull-right">Sign In</button>
               
              </div>

        <?php $this->endWidget(); ?>
          </div>

          <!-- Registration Links -->
          <div class="login-links">
            <p>
              <a href="pages_forgotpw.html" class="active" title="Sign In">Forgot Password?</a>
            </p>
           
          </div>

        

        </div>