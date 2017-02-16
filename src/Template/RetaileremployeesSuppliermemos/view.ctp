<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Retaileremployees Suppliermemo'), ['action' => 'edit', $retaileremployeesSuppliermemo->retailerEmployee_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Retaileremployees Suppliermemo'), ['action' => 'delete', $retaileremployeesSuppliermemo->retailerEmployee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $retaileremployeesSuppliermemo->retailerEmployee_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees Suppliermemos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployees Suppliermemo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliermemos'), ['controller' => 'Suppliermemos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Suppliermemo'), ['controller' => 'Suppliermemos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="retaileremployeesSuppliermemos view large-9 medium-8 columns content">
    <h3><?= h($retaileremployeesSuppliermemo->retailerEmployee_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Retaileremployee') ?></th>
            <td><?= $retaileremployeesSuppliermemo->has('retaileremployee') ? $this->Html->link($retaileremployeesSuppliermemo->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $retaileremployeesSuppliermemo->retaileremployee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Suppliermemo') ?></th>
            <td><?= $retaileremployeesSuppliermemo->has('suppliermemo') ? $this->Html->link($retaileremployeesSuppliermemo->suppliermemo->id, ['controller' => 'Suppliermemos', 'action' => 'view', $retaileremployeesSuppliermemo->suppliermemo->id]) : '' ?></td>
        </tr>
    </table>
</div>
