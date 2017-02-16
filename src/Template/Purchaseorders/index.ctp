<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Purchaseorder'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="purchaseorders index large-9 medium-8 columns content">
    <h3><?= __('Purchaseorders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('totalPrice') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deliveryStatus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplier_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($purchaseorders as $purchaseorder): ?>
            <tr>
                <td><?= $this->Number->format($purchaseorder->id) ?></td>
                <td><?= h($purchaseorder->created) ?></td>
                <td><?= $this->Number->format($purchaseorder->totalPrice) ?></td>
                <td><?= h($purchaseorder->deliveryStatus) ?></td>
                <td><?= $purchaseorder->has('supplier') ? $this->Html->link($purchaseorder->supplier->id, ['controller' => 'Suppliers', 'action' => 'view', $purchaseorder->supplier->id]) : '' ?></td>
                <td><?= $purchaseorder->has('retaileremployee') ? $this->Html->link($purchaseorder->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $purchaseorder->retaileremployee->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $purchaseorder->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchaseorder->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchaseorder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseorder->id)]) ?>
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
