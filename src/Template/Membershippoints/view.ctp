<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Membershippoint'), ['action' => 'edit', $membershippoint->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Membershippoint'), ['action' => 'delete', $membershippoint->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membershippoint->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Membershippoints'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Membershippoint'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="membershippoints view large-9 medium-8 columns content">
    <h3><?= h($membershippoint->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $membershippoint->has('customer') ? $this->Html->link($membershippoint->customer->id, ['controller' => 'Customers', 'action' => 'view', $membershippoint->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($membershippoint->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Points') ?></th>
            <td><?= $this->Number->format($membershippoint->points) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($membershippoint->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Addition') ?></th>
            <td><?= $membershippoint->addition ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
