    <style>
	.navbar{
		display:none;
	}
	</style>
	
	    <div class="register-container animated fadeInDown">
        <div class="registerbox bg-white">
            <div class="registerbox-title">Register</div>

            <div class="registerbox-caption ">Please fill in your information</div>

<form method="post" action="/newapp/site/create" id="users-form" data-validate="parsley">
            <div class="registerbox-textbox">
                <input type="text" name="Users[FirstName]" placeholder="First Name" data-required="true" class="form-control">
            </div>
			<div class="registerbox-textbox">
                <input type="text" name="Users[LastName]" placeholder="Last Name" data-required="true" class="form-control">
            </div>
			
			<div class="registerbox-textbox">
                <input type="text" name="Users[Email]" placeholder="Email" data-required="true" data-type="email" class="form-control">
            </div>
            <div class="registerbox-textbox">
                <input type="password" id="mpass" name="Users[Password]" placeholder="Enter Password" data-required="true" class="form-control">
            </div>
            <div class="registerbox-textbox">
                <input type="password" placeholder="Confirm Password"  data-required="true" data-equalto="#mpass" class="form-control">
            </div>
        
            <div class="registerbox-submit">
                <input type="submit" value="REGISTER" class="btn btn-blue btn-block">
            </div>
			
			</form>

			
        </div>
        <div class="logobox">
        </div>
    </div>
	
	<script>
	
	
	
	</script>

   
	
  