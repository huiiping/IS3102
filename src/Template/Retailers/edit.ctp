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
            </div>
            <div class="box-body">
                <?= $this->Form->create($retailer) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input('retailer_name', array('disabled' => true));
                        //echo $this->Form->input('retailer_desc', ['label'=>'Retailer Description']);
                        //echo $this->Form->input('account_status');
                        echo $this->Form->input('payment_term');
                        //echo $this->Form->input('retailer_email');
                        //echo $this->Form->input('address');
                        //echo $this->Form->input('contact');
                        echo $this->Form->input('contract_start_date',  array('type' => 'datetime',));
                        echo $this->Form->input('contract_end_date', array('type' => 'datetime',));
                        echo $this->Form->input('num_of_users', ['label'=>'No. of Users']);
                        echo $this->Form->input('num_of_warehouses', ['label'=>'No. of Warehouses']);
                        echo $this->Form->input('num_of_stores', ['label'=>'No. of Stores']);
                        echo $this->Form->input('num_of_products', ['label'=>'No. of Products']);
                        echo $this->Form->input('retailer_acc_type_id', ['label'=>'Retailer Account Type'], ['options' => $retailerAccTypes]);
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
