<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transactions Item'), ['action' => 'edit', $transactionsItem->transaction_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transactions Item'), ['action' => 'delete', $transactionsItem->transaction_id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactionsItem->transaction_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transactions Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transactions Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transactionsItems view large-9 medium-8 columns content">
    <h3><?= h($transactionsItem->transaction_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Transaction') ?></th>
            <td><?= $transactionsItem->has('transaction') ? $this->Html->link($transactionsItem->transaction->id, ['controller' => 'Transactions', 'action' => 'view', $transactionsItem->transaction->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $transactionsItem->has('item') ? $this->Html->link($transactionsItem->item->name, ['controller' => 'Items', 'action' => 'view', $transactionsItem->item->id]) : '' ?></td>
        </tr>
    </table>
</div>
