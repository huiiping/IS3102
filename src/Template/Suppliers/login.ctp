<!-- Main Content -->
<script
  src="https://code.jquery.com/jquery-3.1.1.slim.js"
  integrity="sha256-5i/mQ300M779N2OVDrl16lbohwXNUdzL/R2aVUXyXWA="
  crossorigin="anonymous"></script>

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
</style>
<?= $this->Html->css(captcha_layout_stylesheet_url(), ['inline' => false]) ?>

<div class="content-wrapper" id = "main">
  <!-- Main content -->
  <section class="content">
      <div class="row">
		<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns content">
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
				<?=  $this->Form->create(); ?>
					<?=  $this->Form->input('username', array('required' => true)); ?>
					<?=  $this->Form->input('password', array('type' => 'password','required' => true)); ?>
					<?=  $this->Form->input('retailer'); ?>
					<hr>
					<!-- CAPTCHA CSS -->
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
					<!-- End CAPTCHA -->

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
					<hr>
					<?=  $this->Form->submit('Recover my Account', 
					array(	'class' => 'btn btn-lg btn-primary btn-block', 
							'style' => 'border-radius: 10px')); ?>
					<br>
				<?=  $this->Form->end(); ?>

				<button type="button" id="goback" class="btn btn-lg btn-default btn-block" style =" border-radius: 10px ; display:none; ">Go back</button>

				</div>
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
		   	$('#forget_password').slideUp();
		   	$('#resetPass_form').slideDown();
		   	$('#goback').slideDown();
		    
	    });
$('#goback').click(function(){
			$('#loginheading').html('Login to your account');
		   $('#login_form').slideDown();
		   $('#forget_password').slideDown();
		   $('#resetPass_form').slideUp();
		   $('#goback').slideUp();
		    
	    });
</script>


