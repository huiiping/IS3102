<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Element('intrasysLeftSideBar'); ?>

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
              <h3 class="box-title"><?= __('Edit Retailer') ?></h3>
              <div class="pull-right">
                <?= $retailer->has('retailer_acc_type_id') ? $this->Html->link(__('Edit Retailer Account Type'), ['controller' => 'retailer_acc_types', 'action' => 'edit', $retailer->has('retailer_acc_type_id')]) : '' ?>
              </div>
            </div>
            <div class="box-body">
                <?= $this->Form->create($retailer) ?>
                <fieldset>
                    <?php
                        /*echo $this->Form->input('company_name');
                        echo $this->Form->input('company_desc');
                        echo $this->Form->input('first_name');
                        echo $this->Form->input('last_name');
                        echo $this->Form->input('account_status');
                        echo $this->Form->input('payment_term');
                        echo $this->Form->input('loyalty_points');
                        echo $this->Form->input('username');
                        echo $this->Form->input('email');
                        echo $this->Form->input('password');
                        echo $this->Form->input('address');
                        echo $this->Form->input('contact');*/
                        echo $this->Form->input('contract_start_date');
                        echo $this->Form->input('contract_end_date');
                        /*echo $this->Form->input('retailer_acc_type_id', ['options' => $retailerAccTypes]);*/
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
