<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Purchase Order Item'), ['action' => 'edit', $purchaseOrderItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Purchase Order Item'), ['action' => 'delete', $purchaseOrderItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrderItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Purchase Order Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase Order Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Purchase Orders'), ['controller' => 'PurchaseOrders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase Order'), ['controller' => 'PurchaseOrders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="purchaseOrderItems view large-9 medium-8 columns content">
    <h3><?= h($purchaseOrderItem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Purchase Order') ?></th>
            <td><?= $purchaseOrderItem->has('purchase_order') ? $this->Html->link($purchaseOrderItem->purchase_order->id, ['controller' => 'PurchaseOrders', 'action' => 'view', $purchaseOrderItem->purchase_order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($purchaseOrderItem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item Id') ?></th>
            <td><?= $this->Number->format($purchaseOrderItem->item_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($purchaseOrderItem->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unit Price') ?></th>
            <td><?= $this->Number->format($purchaseOrderItem->unit_price) ?></td>
        </tr>
    </table>
</div>
