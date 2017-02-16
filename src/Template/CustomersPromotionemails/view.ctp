<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customers Promotionemail'), ['action' => 'edit', $customersPromotionemail->customer_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customers Promotionemail'), ['action' => 'delete', $customersPromotionemail->customer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $customersPromotionemail->customer_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers Promotionemails'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customers Promotionemail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promotionemails'), ['controller' => 'Promotionemails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotionemail'), ['controller' => 'Promotionemails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customersPromotionemails view large-9 medium-8 columns content">
    <h3><?= h($customersPromotionemail->customer_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $customersPromotionemail->has('customer') ? $this->Html->link($customersPromotionemail->customer->id, ['controller' => 'Customers', 'action' => 'view', $customersPromotionemail->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promotionemail') ?></th>
            <td><?= $customersPromotionemail->has('promotionemail') ? $this->Html->link($customersPromotionemail->promotionemail->id, ['controller' => 'Promotionemails', 'action' => 'view', $customersPromotionemail->promotionemail->id]) : '' ?></td>
        </tr>
    </table>
</div>
