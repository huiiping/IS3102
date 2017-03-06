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
              <h3 class="box-title"><?= __('Edit Retailer Employee') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($retailerEmployee) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input('username', array('readonly'=> 'readonly'));
                        echo $this->Form->input('password', array('readonly'=> 'readonly'));
                        echo $this->Form->input('first_name', array('readonly'=> 'readonly'));
                        echo $this->Form->input('last_name', array('readonly'=> 'readonly'));
                        echo $this->Form->input('email', array('readonly'=> 'readonly'));
                        echo $this->Form->input('address', array('readonly'=> 'readonly'));
                        echo $this->Form->input('contact', array('readonly'=> 'readonly'));
                        echo $this->Form->input('activation_status',['options' => ['Activated' => 'Activated', 'Banned' => 'Banned', 'Deactivated' => 'Deactivated', 'Terminated' => 'Terminated']]);
                        //echo $this->Form->input('activation_token');
                        //echo $this->Form->input('recovery_status');
                        //echo $this->Form->input('recovery_token');
                        echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true]);
                        //Gwen: Need to double check messages
                        //echo $this->Form->input('messages._ids', ['options' => $messages]);
                        echo $this->Form->input('retailer_employee_roles._ids', ['options' => $retailerEmployeeRoles]);
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
