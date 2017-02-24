<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Logging'), ['action' => 'edit', $logging->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Logging'), ['action' => 'delete', $logging->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logging->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Loggings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Logging'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="loggings view large-9 medium-8 columns content">
    <h3><?= h($logging->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= h($logging->action) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entity') ?></th>
            <td><?= h($logging->entity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retailer Employee') ?></th>
            <td><?= $logging->has('retailer_employee') ? $this->Html->link($logging->retailer_employee->id, ['controller' => 'RetailerEmployees', 'action' => 'view', $logging->retailer_employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($logging->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entityid') ?></th>
            <td><?= $this->Number->format($logging->entityid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($logging->created) ?></td>
        </tr>
    </table>
</div>
