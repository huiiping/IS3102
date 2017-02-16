<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customers Retaileremployee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customersRetaileremployees index large-9 medium-8 columns content">
    <h3><?= __('Customers Retaileremployees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customersRetaileremployees as $customersRetaileremployee): ?>
            <tr>
                <td><?= $customersRetaileremployee->has('customer') ? $this->Html->link($customersRetaileremployee->customer->id, ['controller' => 'Customers', 'action' => 'view', $customersRetaileremployee->customer->id]) : '' ?></td>
                <td><?= $customersRetaileremployee->has('retaileremployee') ? $this->Html->link($customersRetaileremployee->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $customersRetaileremployee->retaileremployee->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customersRetaileremployee->customer_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customersRetaileremployee->customer_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customersRetaileremployee->customer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $customersRetaileremployee->customer_id)]) ?>
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
