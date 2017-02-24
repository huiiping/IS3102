<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Retailer Logging'), ['action' => 'edit', $retailerLogging->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Retailer Logging'), ['action' => 'delete', $retailerLogging->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerLogging->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Loggings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Logging'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="retailerLoggings view large-9 medium-8 columns content">
    <h3><?= h($retailerLogging->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= h($retailerLogging->action) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entity') ?></th>
            <td><?= h($retailerLogging->entity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retailer Employee') ?></th>
            <td><?= $retailerLogging->has('retailer_employee') ? $this->Html->link($retailerLogging->retailer_employee->id, ['controller' => 'RetailerEmployees', 'action' => 'view', $retailerLogging->retailer_employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($retailerLogging->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entityid') ?></th>
            <td><?= $this->Number->format($retailerLogging->entityid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($retailerLogging->created) ?></td>
        </tr>
    </table>
</div>
