<!-- Main Content -->
<style>
	#main {
		background-image: url(/IS3102_Final/img/supplierLogin.jpeg); 
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
</style>
<?= $this->Html->css(captcha_layout_stylesheet_url(), ['inline' => false]) ?>

<div class="content-wrapper" id = "main">
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<div class="box box-primary" id="box">
					<div class="box-header with-border">
						<br><br>

						<h1 class="text-center">Welcome to CLRMS!</h1>
						<hr>
						<div class="panel panel-default " id="form_box">
							<div class="panel-heading">
								<h2 id="loginheading" class="panel-title text-center">Login to your account</h2>   
							</div>
							<br>
							<div id = "login_form">

								<form method="post" accept-charset="utf-8" action="/IS3102_Final/suppliers/login">
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

									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
										<input class = "form-control" type="text" name="retailer" placeholder = "Retailer" required="required" id="retailer">
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

								<form method="post" accept-charset="utf-8" action="/IS3102_Final/suppliers/recover">
									<div style="display:none;">
										<input type="hidden" name="_method" value="POST">
									</div>
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
										<input class = "form-control" placeholder = "Email" type="text" name="email" id="email" required="required">
									</div>
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
										<input class = "form-control" placeholder = "Retailer" type="text" name="retailer" id="retailer" required="required">
									</div>			
									<hr>
									<div class="submit" style="padding-bottom:5px"><input type="submit" class="btn btn-md btn-primary btn-block" style="border-radius: 10px" value="Recover my Account">
									</div>	
									<button type="button" id="goback" class="btn btn-md btn-default btn-block" style="border-radius: 10px; display: block;">Go back</button>				
								</form>
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
	</script>



<!--
<?=  $this->Form->create(); ?>
								<?=  $this->Form->input('username', array('required' => true)); ?>
								<?=  $this->Form->input('password', array('type' => 'password','required' => true)); ?>
								<?=  $this->Form->input('retailer'); ?>
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


								<div id = "resetPass_form" style="display:none;" >

									<?=  $this->Form->create('Post', ['url' => ['action' => 'recover']]); ?>
									<?=  $this->Form->input('Enter your email address', array(	'id' => 'email' ,'name' => 'email', 'required' => true)); ?>
									<?=  $this->Form->input('retailer',array('required' => true)); ?>
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