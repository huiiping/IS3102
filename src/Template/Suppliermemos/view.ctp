<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Suppliermemo'), ['action' => 'edit', $suppliermemo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Suppliermemo'), ['action' => 'delete', $suppliermemo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suppliermemo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Suppliermemos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Suppliermemo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="suppliermemos view large-9 medium-8 columns content">
    <h3><?= h($suppliermemo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Remarks') ?></th>
            <td><?= h($suppliermemo->remarks) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier') ?></th>
            <td><?= $suppliermemo->has('supplier') ? $this->Html->link($suppliermemo->supplier->id, ['controller' => 'Suppliers', 'action' => 'view', $suppliermemo->supplier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retaileremployee') ?></th>
            <td><?= $suppliermemo->has('retaileremployee') ? $this->Html->link($suppliermemo->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $suppliermemo->retaileremployee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($suppliermemo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($suppliermemo->created) ?></td>
        </tr>
    </table>
</div>
