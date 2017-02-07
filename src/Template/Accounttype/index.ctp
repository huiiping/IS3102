<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Accounttype'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accounttype index large-9 medium-8 columns content">
    <h3><?= __('Accounttype') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('accountId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('accountTypeName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numOfUsers') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numOfWarehouses') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numOfStores') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numOfProductTypes') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accounttype as $accounttype): ?>
            <tr>
                <td><?= $this->Number->format($accounttype->accountId) ?></td>
                <td><?= h($accounttype->accountTypeName) ?></td>
                <td><?= $this->Number->format($accounttype->numOfUsers) ?></td>
                <td><?= $this->Number->format($accounttype->numOfWarehouses) ?></td>
                <td><?= $this->Number->format($accounttype->numOfStores) ?></td>
                <td><?= $this->Number->format($accounttype->numOfProductTypes) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $accounttype->accountId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $accounttype->accountId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $accounttype->accountId], ['confirm' => __('Are you sure you want to delete # {0}?', $accounttype->accountId)]) ?>
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
