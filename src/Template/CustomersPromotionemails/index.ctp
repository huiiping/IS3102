<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customers Promotionemail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Promotionemails'), ['controller' => 'Promotionemails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotionemail'), ['controller' => 'Promotionemails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customersPromotionemails index large-9 medium-8 columns content">
    <h3><?= __('Customers Promotionemails') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('promotionEmail_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customersPromotionemails as $customersPromotionemail): ?>
            <tr>
                <td><?= $customersPromotionemail->has('customer') ? $this->Html->link($customersPromotionemail->customer->id, ['controller' => 'Customers', 'action' => 'view', $customersPromotionemail->customer->id]) : '' ?></td>
                <td><?= $customersPromotionemail->has('promotionemail') ? $this->Html->link($customersPromotionemail->promotionemail->id, ['controller' => 'Promotionemails', 'action' => 'view', $customersPromotionemail->promotionemail->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customersPromotionemail->customer_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customersPromotionemail->customer_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customersPromotionemail->customer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $customersPromotionemail->customer_id)]) ?>
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
