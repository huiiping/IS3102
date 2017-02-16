<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Purchaseorderitem'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Purchaseorders'), ['controller' => 'Purchaseorders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchaseorder'), ['controller' => 'Purchaseorders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="purchaseorderitems index large-9 medium-8 columns content">
    <h3><?= __('Purchaseorderitems') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('productTypeID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unitPrice') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subTotalPrice') ?></th>
                <th scope="col"><?= $this->Paginator->sort('purchaseOrder_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($purchaseorderitems as $purchaseorderitem): ?>
            <tr>
                <td><?= $this->Number->format($purchaseorderitem->id) ?></td>
                <td><?= $this->Number->format($purchaseorderitem->productTypeID) ?></td>
                <td><?= $this->Number->format($purchaseorderitem->quantity) ?></td>
                <td><?= $this->Number->format($purchaseorderitem->unitPrice) ?></td>
                <td><?= $this->Number->format($purchaseorderitem->subTotalPrice) ?></td>
                <td><?= $purchaseorderitem->has('purchaseorder') ? $this->Html->link($purchaseorderitem->purchaseorder->id, ['controller' => 'Purchaseorders', 'action' => 'view', $purchaseorderitem->purchaseorder->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $purchaseorderitem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchaseorderitem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchaseorderitem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseorderitem->id)]) ?>
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
