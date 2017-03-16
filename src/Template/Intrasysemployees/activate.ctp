<!-- Main Content -->


<style>
	#main {
		background-image: url(/IS3102_Final/img/intrasysLogin4.jpg); 

		background-size: cover;

	}
	#box {
		border-radius: 15px ;  
		background-color: rgba(255,255,255,.7); 
		overflow: hidden;
	}
	#form_box {
		padding: 0;
		border-radius:10px;
		overflow: hidden;
	}
	#login_form, #resetPass_form{
		padding: 15px;
	}
	.input-group{
		padding-bottom: 8px;
	}
	.flexmain{
		display:flex;
	}
	.registerInfo{
		font-size:10px;
	}

</style>
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal('show');
	});

	function checkPasswordMatch() {
		var password = $("#txtNewPassword").val();
		var confirmPassword = $("#txtConfirmPassword").val();

		if (password != confirmPassword){
			
			document.getElementById('checkPasswordMatch').className = "fa fa-close";
			document.getElementById("checkPasswordMatch").style.color = "red";
			$("#checkPasswordMatch").show();
			return false;
		}
		else{
			
			document.getElementById('checkPasswordMatch').className = "fa fa-check";
			document.getElementById('checkPasswordMatch').style.color = "#00a65a";
			$("#checkPasswordMatch").show();
			return true;
		}
	}

	function validatePass(){
		var TCode = document.getElementById('txtNewPassword').value;
		
		if( /[^a-zA-Z0-9]/.test( TCode ) || TCode.length<8) {
			document.getElementById('validatePassword').className = "fa fa-close";
			document.getElementById('validatePassword').style.color = "red";
			$("#validatePassword").show();
			return false;
		}
		else{
			document.getElementById('validatePassword').className = "fa fa-check";
			document.getElementById('validatePassword').style.color = "#00a65a";
			$("#validatePassword").show();
			return true;
		}
	}


</script>

<?= $this->Html->css(captcha_layout_stylesheet_url(), ['inline' => false]) ?>

<div class="content-wrapper" id = "main">
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-offset-4 col-md-4">


				<div id="myModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title">Welcome to CLRMS new user</h4>
							</div>
							<div class="modal-body">
								<p>Please enter your desired password</p>
								<form method="post" accept-charset="utf-8" action="/IS3102_Final/intrasys-employees/setPassword" onsubmit="return validateForm()">
									<div class = "row">
										<div class="col-md-10 col-xs-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
												<input id="txtNewPassword" onkeyup="checkPasswordMatch();validatePass();" type="password" class="form-control" placeholder="Password" required="required" name="password">
											</div>
										</div>
										<div class="checkIcons" >
											<span id="validatePassword" class="fa fa-check" style="display:none; font-size: 24px"></span>
										</div>
									</div>
									<p class="registerInfo">*Password has to be alphanumeric and at least 8 characters long</p>
									<div class = "row">
										<div class="col-md-10 col-xs-10">
											<div class=" input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
												<input id="txtConfirmPassword" onkeyup="checkPasswordMatch();" type="password" class="form-control" placeholder="Confirm Password" required="required">
											</div>
										</div>
										<div class="checkIcons" >
											<span id="checkPasswordMatch" class="fa fa-check" style="display:none; font-size: 24px"></span>
										</div>
									</div>
									<input type='hidden' name='employeeId' value='<?php echo "$employeeId";?>'/>
									<input type='hidden' name='token' value='<?php echo "$token";?>'/>
									<p id=validateMessage><strong></strong><p>
										<div class = "row">
											<button type="submit" class="btn btn-primary pull-right" style="margin:15px">Confirm</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<div class="box box-primary" id="box">
						<div class="box-header with-border" style="padding:20px">
							<br><br>

							<h1 class="text-center">Welcome to CLRMS!</h1>
							<hr>
							<div class="panel panel-default " id="form_box">
								<div class="panel-heading">
									<h2 id="loginheading" class="panel-title text-center">Login to your account</h2>   
								</div>
								<br>

								<div id = "login_form">

									<form method="post" accept-charset="utf-8" action="/IS3102_Final/intrasys-employees/login">
										<div style="display:none;">
											<input type="hidden" name="_method" value="POST">
										</div>					
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
											<input class = "form-control" type="text" placeholder = "Username" name="username" required="required" id="username">	
										</div>				
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
											<input class = "form-control" type="password" name="password" placeholder = "Password" required="required" id="password">
										</div>					
										<br>
										<!-- CAPTCHA CSS -->
										<?php 
										$session = $this->request->session();
										if ($session->check('login_fail') && $session->read('login_fail') > 3) : ?>


										<?= captcha_image_html() ?>
										<?= $this->Form->input('CaptchaCode', [
											'label' => 'Retype the characters from the picture:',
											'maxlength' => '10',
											'class'=>'form-control',
											'id' => 'CaptchaCode',

											]) ?>
										<?php endif; ?>
										<!-- End CAPTCHA -->

										<hr>

										<div class="submit" style="padding-bottom: 5px;">
											<input type="submit" class="btn btn-md btn-primary btn-block" style="border-radius: 10px;" value="Login">
										</div>					
										<button type="button" id="forget_password" class="btn btn-md btn-default btn-block" style =" border-radius: 10px ;">Forgot Password</button>
									</form>
								</div>

								<div id="resetPass_form" style="display: none;">
									<div style="display:none;">
										<input type="hidden" name="_method" value="POST">
									</div>
									<p style="text-align: center;"><strong>Please contact your IT department <br> regarding recovery of account</strong></p>		
									<hr>
									<button type="button" id="goback" class="btn btn-md btn-default btn-block" style="border-radius: 10px; display: block;">Go back</button>						
								</div>




								<!--<?= $this->Html->link(__('Logout'), ['controller' => 'IntrasysEmployees', 'action' => 'logout', 'class'=>'btn btn-default btn-flat']); ?>-->
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<script>
			$('#forget_password').click(function(){
				$('#loginheading').html('Recover my Account');
				$('#login_form').slideUp();
				$('#resetPass_form').slideDown();


			});
			$('#goback').click(function(){
				$('#loginheading').html('Login to your account');
				$('#login_form').slideDown();
				$('#resetPass_form').slideUp();


			});
			function validateForm(){
				
				if (validatePass() && checkPasswordMatch()){
					return true;
				}
				if (!validatePass()){
					document.getElementById('validateMessage').innerHTML = "Password does not meet requirements";
					return false;
				}
				if (!checkPasswordMatch()){
					document.getElementById('validateMessage').innerHTML = "Passwords do not match";
					return false;
				}

			}
	/*	function validate(){

			if(!document.getElementById("password").value==document.getElementById("confirm_password").value)alert("Passwords do no match");
			return document.getElementById("password").value==document.getElementById("confirm_password").value;
			return false;
		}*/

	</script>

<!--
				<?=  $this->Form->create(); ?>
					<?=  $this->Form->input('username', array('required' => true)); ?>
					<?=  $this->Form->input('password', array('type' => 'password', 'required' => true)); ?>
					<hr>
					
					<?php 
					$session = $this->request->session();
					if ($session->check('login_fail') && $session->read('login_fail') > 3) : ?>

					<?= captcha_image_html() ?>
					<?= $this->Form->input('CaptchaCode', [
					  'label' => 'Retype the characters from the picture:',
					  'maxlength' => '10',
					  'id' => 'CaptchaCode'
					]) ?>
					<?php endif; ?>
					
					
					<?=  $this->Form->submit('Login', 
					array(	'class' => 'btn btn-lg btn-primary btn-block', 
							'style' => 'border-radius: 10px')); ?>
					<br>
				<?=  $this->Form->end(); ?>

				<button type="button" id="forget_password" class="btn btn-lg btn-default btn-block" style =" border-radius: 10px ;">Forgot Password</button>

				</div>
			-->


<!--
			<div id = "resetPass_form" style="display:none;" >

				<?=  $this->Form->create('Post', ['url' => ['action' => 'recover']]); ?>
				<?=  $this->Form->input('Enter your email address', array(	'id' => 'email' ,'name' => 'email', 'required' => true)); ?>
				<hr>
				<?=  $this->Form->submit('Recover my Account', 
					array(	'class' => 'btn btn-lg btn-primary btn-block', 
					'style' => 'border-radius: 10px')); ?>
					<br>
					<?=  $this->Form->end(); ?>

					<button type="button" id="goback" class="btn btn-lg btn-default btn-block" style =" border-radius: 10px ; display:none; ">Go back</button>

				</div>
			</div>

		-->


		
<!--
<div id="resetPass_form" style="display: none;">

				<form method="post" accept-charset="utf-8" action="/IS3102_Final/intrasys-employees/recover">
					<div style="display:none;">
						<input type="hidden" name="_method" value="POST">
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input class = "form-control" placeholder = "Email" type="text" name="email" id="email" required="required">
					</div>			
					<hr>
					<div class="submit" style="padding-bottom:5px"><input type="submit" class="btn btn-md btn-primary btn-block" style="border-radius: 10px" value="Recover my Account">
					</div>	
					<button type="button" id="goback" class="btn btn-md btn-default btn-block" style="border-radius: 10px; display: block;">Go back</button>				
				</form>
				

			</div>
-->