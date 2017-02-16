<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Incidentreport'), ['action' => 'edit', $incidentreport->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Incidentreport'), ['action' => 'delete', $incidentreport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $incidentreport->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Incidentreports'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Incidentreport'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="incidentreports view large-9 medium-8 columns content">
    <h3><?= h($incidentreport->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($incidentreport->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retaileremployee') ?></th>
            <td><?= $incidentreport->has('retaileremployee') ? $this->Html->link($incidentreport->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $incidentreport->retaileremployee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($incidentreport->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference Id') ?></th>
            <td><?= $this->Number->format($incidentreport->reference_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DateCreated') ?></th>
            <td><?= h($incidentreport->dateCreated) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $incidentreport->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
