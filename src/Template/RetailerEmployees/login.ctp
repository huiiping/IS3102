<!-- Main Content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
      <div class="row">
		<div class="index large-6 medium-4 large-offset-3 medium-offset-4 columns content">
		  <div class="box box-primary">
			<div class="box-header with-border">
				<br><br>
				<h1 class="text-center">Welcome to CLRMS!</h1>
				<br><br>
				<?=  $this->Form->create(); ?>
					<?=  $this->Form->input('username'); ?>
					<?=  $this->Form->input('password', array('type' => 'password')); ?>
					<?=  $this->Form->submit('Login', array('class' => 'button')); ?>
				<?=  $this->Form->end(); ?>
			</div>
		  </div>
		</div>
	  </div>
  </section>
</div>