<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Membership Point'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="membershipPoints index large-9 medium-8 columns content">
    <h3><?= __('Membership Points') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pts') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remarks') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($membershipPoints as $membershipPoint): ?>
            <tr>
                <td><?= $this->Number->format($membershipPoint->id) ?></td>
                <td><?= $membershipPoint->has('customer') ? $this->Html->link($membershipPoint->customer->id, ['controller' => 'Customers', 'action' => 'view', $membershipPoint->customer->id]) : '' ?></td>
                <td><?= $this->Number->format($membershipPoint->pts) ?></td>
                <td><?= h($membershipPoint->type) ?></td>
                <td><?= h($membershipPoint->remarks) ?></td>
                <td><?= h($membershipPoint->created) ?></td>
                <td><?= $membershipPoint->has('retailer_employee') ? $this->Html->link($membershipPoint->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $membershipPoint->retailer_employee->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $membershipPoint->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $membershipPoint->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $membershipPoint->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membershipPoint->id)]) ?>
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
