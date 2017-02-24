<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Intrasys Logging'), ['action' => 'edit', $intrasysLogging->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Intrasys Logging'), ['action' => 'delete', $intrasysLogging->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysLogging->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Intrasys Loggings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intrasys Logging'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailers'), ['controller' => 'Retailers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer'), ['controller' => 'Retailers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="intrasysLoggings view large-9 medium-8 columns content">
    <h3><?= h($intrasysLogging->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Retailer') ?></th>
            <td><?= $intrasysLogging->has('retailer') ? $this->Html->link($intrasysLogging->retailer->id, ['controller' => 'Retailers', 'action' => 'view', $intrasysLogging->retailer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= h($intrasysLogging->action) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entity') ?></th>
            <td><?= h($intrasysLogging->entity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($intrasysLogging->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entityid') ?></th>
            <td><?= $this->Number->format($intrasysLogging->entityid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employeeid') ?></th>
            <td><?= $this->Number->format($intrasysLogging->employeeid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($intrasysLogging->created) ?></td>
        </tr>
    </table>
</div>
