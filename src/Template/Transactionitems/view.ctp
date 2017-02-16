<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transactionitem'), ['action' => 'edit', $transactionitem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transactionitem'), ['action' => 'delete', $transactionitem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactionitem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transactionitems'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transactionitem'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transactionitems view large-9 medium-8 columns content">
    <h3><?= h($transactionitem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('TransactionStatus') ?></th>
            <td><?= h($transactionitem->transactionStatus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $transactionitem->has('item') ? $this->Html->link($transactionitem->item->id, ['controller' => 'Items', 'action' => 'view', $transactionitem->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction') ?></th>
            <td><?= $transactionitem->has('transaction') ? $this->Html->link($transactionitem->transaction->id, ['controller' => 'Transactions', 'action' => 'view', $transactionitem->transaction->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($transactionitem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($transactionitem->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UnitPrice') ?></th>
            <td><?= $this->Number->format($transactionitem->unitPrice) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('ItemDesc') ?></h4>
        <?= $this->Text->autoParagraph(h($transactionitem->itemDesc)); ?>
    </div>
</div>
