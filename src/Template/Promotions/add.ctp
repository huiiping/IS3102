<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prod Types'), ['controller' => 'ProdTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prod Type'), ['controller' => 'ProdTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="promotions form large-9 medium-8 columns content">
    <?= $this->Form->create($promotion) ?>
    <fieldset>
        <legend><?= __('Add Promotion') ?></legend>
        <?php
            echo $this->Form->input('start_date', array(
                'label' => 'Start Date (GMT)',
                'selected' => '0000:00:00 00:00:00'));
            echo $this->Form->input('end_date', array(
                'label' => 'End Date (GMT)',
                'selected' => '0000:00:00 00:00:00'));
            echo $this->Form->input('promo_desc', array('label' => 'Description'));
            echo $this->Form->input('first_voucher_num', array('label' => 'Voucher Starting Number'));
            echo $this->Form->input('last_voucher_num', array('label' => 'Voucher Ending Number'));
            echo $this->Form->input('discount_rate', array('label' => 'Discount Rate (%) '));
            echo $this->Form->input('credit_card_type', array('label' => 'Applicable Credit Card(s)'));
            $session = $this->request->session();
            echo $this->Form->hidden('retailer_employee_id', ['value'=>$session->read('retailer_employee_id')]);
            echo $this->Form->input('customer_tier', array('label' => 'Applicable to Customer Tier(s)'));
            //echo $this->Form->input('retailer_employee_id', ['options' => $retailerEmployees, 'empty' => true]);
            //echo $this->Form->input('customers._ids', ['options' => $customers]);
            echo $this->Form->input('prod_types._ids', array('options' => $prodTypes, 'label' => 'Applicable to Product Type(s)'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
