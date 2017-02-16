<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customers Retaileremployee'), ['action' => 'edit', $customersRetaileremployee->customer_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customers Retaileremployee'), ['action' => 'delete', $customersRetaileremployee->customer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $customersRetaileremployee->customer_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers Retaileremployees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customers Retaileremployee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customersRetaileremployees view large-9 medium-8 columns content">
    <h3><?= h($customersRetaileremployee->customer_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $customersRetaileremployee->has('customer') ? $this->Html->link($customersRetaileremployee->customer->id, ['controller' => 'Customers', 'action' => 'view', $customersRetaileremployee->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retaileremployee') ?></th>
            <td><?= $customersRetaileremployee->has('retaileremployee') ? $this->Html->link($customersRetaileremployee->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $customersRetaileremployee->retaileremployee->id]) : '' ?></td>
        </tr>
    </table>
</div>
