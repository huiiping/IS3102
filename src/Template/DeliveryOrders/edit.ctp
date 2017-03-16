<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $deliveryOrder->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryOrder->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Delivery Orders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Delivery Order Items'), ['controller' => 'DeliveryOrderItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Delivery Order Item'), ['controller' => 'DeliveryOrderItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deliveryOrders form large-9 medium-8 columns content">
    <?= $this->Form->create($deliveryOrder) ?>
    <fieldset>
        <legend><?= __('Edit Delivery Order') ?></legend>
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
