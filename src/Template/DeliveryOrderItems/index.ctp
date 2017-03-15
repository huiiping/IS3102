<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Delivery Order Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Delivery Orders'), ['controller' => 'DeliveryOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Delivery Order'), ['controller' => 'DeliveryOrders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deliveryOrderItems index large-9 medium-8 columns content">
    <h3><?= __('Delivery Order Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('itemID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EPC') ?></th>
                <th scope="col"><?= $this->Paginator->sort('barcode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delivery_order_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deliveryOrderItems as $deliveryOrderItem): ?>
            <tr>
                <td><?= $this->Number->format($deliveryOrderItem->id) ?></td>
                <td><?= h($deliveryOrderItem->itemID) ?></td>
                <td><?= h($deliveryOrderItem->EPC) ?></td>
                <td><?= h($deliveryOrderItem->barcode) ?></td>
                <td><?= $deliveryOrderItem->has('delivery_order') ? $this->Html->link($deliveryOrderItem->delivery_order->id, ['controller' => 'DeliveryOrders', 'action' => 'view', $deliveryOrderItem->delivery_order->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $deliveryOrderItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deliveryOrderItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deliveryOrderItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryOrderItem->id)]) ?>
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
