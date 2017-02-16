<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Retaileremployees Transaction'), ['action' => 'edit', $retaileremployeesTransaction->retailerEmployee_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Retaileremployees Transaction'), ['action' => 'delete', $retaileremployeesTransaction->retailerEmployee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $retaileremployeesTransaction->retailerEmployee_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees Transactions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployees Transaction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="retaileremployeesTransactions view large-9 medium-8 columns content">
    <h3><?= h($retaileremployeesTransaction->retailerEmployee_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Retaileremployee') ?></th>
            <td><?= $retaileremployeesTransaction->has('retaileremployee') ? $this->Html->link($retaileremployeesTransaction->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $retaileremployeesTransaction->retaileremployee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction') ?></th>
            <td><?= $retaileremployeesTransaction->has('transaction') ? $this->Html->link($retaileremployeesTransaction->transaction->id, ['controller' => 'Transactions', 'action' => 'view', $retaileremployeesTransaction->transaction->id]) : '' ?></td>
        </tr>
    </table>
</div>
