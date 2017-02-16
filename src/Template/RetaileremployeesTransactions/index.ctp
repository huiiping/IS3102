<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Retaileremployees Transaction'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retaileremployeesTransactions index large-9 medium-8 columns content">
    <h3><?= __('Retaileremployees Transactions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('retailerEmployee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transaction_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($retaileremployeesTransactions as $retaileremployeesTransaction): ?>
            <tr>
                <td><?= $retaileremployeesTransaction->has('retaileremployee') ? $this->Html->link($retaileremployeesTransaction->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $retaileremployeesTransaction->retaileremployee->id]) : '' ?></td>
                <td><?= $retaileremployeesTransaction->has('transaction') ? $this->Html->link($retaileremployeesTransaction->transaction->id, ['controller' => 'Transactions', 'action' => 'view', $retaileremployeesTransaction->transaction->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $retaileremployeesTransaction->retailerEmployee_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $retaileremployeesTransaction->retailerEmployee_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $retaileremployeesTransaction->retailerEmployee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $retaileremployeesTransaction->retailerEmployee_id)]) ?>
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
