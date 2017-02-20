<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Purchase Order Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Purchase Orders'), ['controller' => 'PurchaseOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchase Order'), ['controller' => 'PurchaseOrders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="purchaseOrderItems index large-9 medium-8 columns content">
    <h3><?= __('Purchase Order Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unit_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_total_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('purchase_order_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($purchaseOrderItems as $purchaseOrderItem): ?>
            <tr>
                <td><?= $this->Number->format($purchaseOrderItem->id) ?></td>
                <td><?= $this->Number->format($purchaseOrderItem->item_ID) ?></td>
                <td><?= h($purchaseOrderItem->item_name) ?></td>
                <td><?= $this->Number->format($purchaseOrderItem->quantity) ?></td>
                <td><?= $this->Number->format($purchaseOrderItem->unit_price) ?></td>
                <td><?= $this->Number->format($purchaseOrderItem->sub_total_price) ?></td>
                <td><?= $purchaseOrderItem->has('purchase_order') ? $this->Html->link($purchaseOrderItem->purchase_order->id, ['controller' => 'PurchaseOrders', 'action' => 'view', $purchaseOrderItem->purchase_order->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $purchaseOrderItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchaseOrderItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchaseOrderItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrderItem->id)]) ?>
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
