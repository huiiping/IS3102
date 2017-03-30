<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section class="content">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Create New Delivery Order</h3>
        </div>
    </div>
    <div class="main" style="padding: 10px 20px;">

      <form method="post" accept-charset="utf-8" action="/IS3102_Final/delivery-orders/add">
        <div style="display:none;">
          <input type="hidden" name="_method" value="POST">
      </div>

    <div class="deliveryOrders form large-9 medium-8 columns content">
        <?= $this->Form->create($deliveryOrder) ?>
        <fieldset>
            <legend><?= __('Add Delivery Order') ?></legend>
            <?php
            echo $this->Form->control('status');
            echo $this->Form->control('fee');
            echo $this->Form->control('deliverer');
            echo $this->Form->control('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->control('retailer_employee_id', ['options' => $retailerEmployees, 'empty' => true]);
            echo $this->Form->control('location_id', ['options' => $locations, 'empty' => true]);
            echo $this->Form->control('transaction_id', ['options' => $transactions, 'empty' => true]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
