<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Membershippoint'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="membershippoints index large-9 medium-8 columns content">
    <h3><?= __('Membershippoints') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('points') ?></th>
                <th scope="col"><?= $this->Paginator->sort('addition') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($membershippoints as $membershippoint): ?>
            <tr>
                <td><?= $this->Number->format($membershippoint->id) ?></td>
                <td><?= $this->Number->format($membershippoint->points) ?></td>
                <td><?= h($membershippoint->addition) ?></td>
                <td><?= h($membershippoint->created) ?></td>
                <td><?= $membershippoint->has('customer') ? $this->Html->link($membershippoint->customer->id, ['controller' => 'Customers', 'action' => 'view', $membershippoint->customer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $membershippoint->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $membershippoint->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $membershippoint->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membershippoint->id)]) ?>
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
