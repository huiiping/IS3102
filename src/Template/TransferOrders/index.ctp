<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Transfer Order'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transfer Order Items'), ['controller' => 'TransferOrderItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transfer Order Item'), ['controller' => 'TransferOrderItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transferOrders index large-9 medium-8 columns content">
    <h3><?= __('Transfer Orders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locationFrom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locationTo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remarks') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplier_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transferOrders as $transferOrder): ?>
            <tr>
                <td><?= $this->Number->format($transferOrder->id) ?></td>
                <td><?= $this->Number->format($transferOrder->locationFrom) ?></td>
                <td><?= $this->Number->format($transferOrder->locationTo) ?></td>
                <td><?= h($transferOrder->status) ?></td>
                <td><?= h($transferOrder->remarks) ?></td>
                <td><?= $transferOrder->has('retailer_employee') ? $this->Html->link($transferOrder->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $transferOrder->retailer_employee->id]) : '' ?></td>
                <td><?= $this->Number->format($transferOrder->supplier_id) ?></td>
                <td><?= h($transferOrder->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $transferOrder->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transferOrder->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transferOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferOrder->id)]) ?>
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
