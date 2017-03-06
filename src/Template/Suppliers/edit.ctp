<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Element('retailerLeftSideBar'); ?>

<!-- Main Content -->
<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
  </section>
  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Edit Supplier') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($supplier) ?>
                <fieldset>
                    <?php
                        //echo $this->Form->input('username');
                        //echo $this->Form->input('password');
                        //echo $this->Form->input(('confirm_password'), array('type'  =>  'password')); 
                        echo $this->Form->input('supplier_name');
                        echo $this->Form->input('email');
                        echo $this->Form->input('contact');
                        echo $this->Form->input('address');
                        echo $this->Form->input('country');
                        //echo $this->Form->input('activation_status');
                        //echo $this->Form->input('activation_token');
                        //echo $this->Form->input('recovery_status');
                        //echo $this->Form->input('recovery_token');
                        echo $this->Form->input('bank_acc');
                    ?>
                </fieldset>
                <br>
                <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
                <?= $this->Form->end() ?>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
