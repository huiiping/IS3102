<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Transactions Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transactionsItems index large-9 medium-8 columns content">
    <h3><?= __('Transactions Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('transaction_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactionsItems as $transactionsItem): ?>
            <tr>
                <td><?= $transactionsItem->has('transaction') ? $this->Html->link($transactionsItem->transaction->id, ['controller' => 'Transactions', 'action' => 'view', $transactionsItem->transaction->id]) : '' ?></td>
                <td><?= $transactionsItem->has('item') ? $this->Html->link($transactionsItem->item->name, ['controller' => 'Items', 'action' => 'view', $transactionsItem->item->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $transactionsItem->transaction_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transactionsItem->transaction_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transactionsItem->transaction_id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactionsItem->transaction_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
