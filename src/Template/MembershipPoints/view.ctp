<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Membership Point'), ['action' => 'edit', $membershipPoint->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Membership Point'), ['action' => 'delete', $membershipPoint->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membershipPoint->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Membership Points'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Membership Point'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="membershipPoints view large-9 medium-8 columns content">
    <h3><?= h($membershipPoint->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $membershipPoint->has('customer') ? $this->Html->link($membershipPoint->customer->id, ['controller' => 'Customers', 'action' => 'view', $membershipPoint->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($membershipPoint->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remarks') ?></th>
            <td><?= h($membershipPoint->remarks) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retailer Employee') ?></th>
            <td><?= $membershipPoint->has('retailer_employee') ? $this->Html->link($membershipPoint->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $membershipPoint->retailer_employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($membershipPoint->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pts') ?></th>
            <td><?= $this->Number->format($membershipPoint->pts) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($membershipPoint->created) ?></td>
        </tr>
    </table>
</div>
