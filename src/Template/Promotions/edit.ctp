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
              <h3 class="box-title"><?= __('Edit Promotion') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($promotion) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input('start_date', array('label' => 'Start Date (GMT)'));
                        echo $this->Form->input('end_date', array('label' => 'End Date (GMT)'));
                        echo $this->Form->input('promo_desc', array('label' => 'Description'));
                        echo $this->Form->input('first_voucher_num', array('label' => 'Voucher Starting Number'));
                        echo $this->Form->input('last_voucher_num', array('label' => 'Voucher Ending Number'));
                        echo $this->Form->input('discount_rate', array('label' => 'Discount Rate (%) '));
                        echo $this->Form->input('credit_card_type', array('label' => 'Applicable Credit Card(s)'));
                        $session = $this->request->session();
                        echo $this->Form->hidden('retailer_employee_id', ['value'=>$session->read('retailer_employee_id')]);
                        //echo $this->Form->input('retailer_employee_id', ['options' => $retailerEmployees, 'empty' => true]);
                        //echo $this->Form->input('customer_tier', array('label' => 'Applicable to Customer Tier(s)'));                        
                        echo $this->Form->input('customers._ids', ['options' => $customers]);
                        echo $this->Form->input('prod_types._ids', array('options' => $prodTypes, 'label' => 'Applicable to Product Type(s)'));
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
