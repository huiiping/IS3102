<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Quotation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="quotations index large-9 medium-8 columns content">
    <h3><?= __('Quotations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplier_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($quotations as $quotation): ?>
            <tr>
                <td><?= $this->Number->format($quotation->id) ?></td>
                <td><?= h($quotation->title) ?></td>
                <td><?= h($quotation->modified) ?></td>
                <td><?= h($quotation->created) ?></td>
                <td><?= $quotation->has('retailer_employee') ? $this->Html->link($quotation->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $quotation->retailer_employee->id]) : '' ?></td>
                <td><?= $quotation->has('supplier') ? $this->Html->link($quotation->supplier->supplier_name, ['controller' => 'Suppliers', 'action' => 'view', $quotation->supplier->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $quotation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quotation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quotation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quotation->id)]) ?>
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
