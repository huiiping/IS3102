<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transaction Item'), ['action' => 'edit', $transactionItem->transaction_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transaction Item'), ['action' => 'delete', $transactionItem->transaction_id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactionItem->transaction_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transaction Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transactionItems view large-9 medium-8 columns content">
    <h3><?= h($transactionItem->transaction_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Transaction') ?></th>
            <td><?= $transactionItem->has('transaction') ? $this->Html->link($transactionItem->transaction->id, ['controller' => 'Transactions', 'action' => 'view', $transactionItem->transaction->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $transactionItem->has('item') ? $this->Html->link($transactionItem->item->name, ['controller' => 'Items', 'action' => 'view', $transactionItem->item->id]) : '' ?></td>
        </tr>
    </table>
</div>
