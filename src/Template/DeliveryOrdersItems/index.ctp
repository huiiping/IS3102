<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Delivery Orders Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Delivery Orders'), ['controller' => 'DeliveryOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Delivery Order'), ['controller' => 'DeliveryOrders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deliveryOrdersItems index large-9 medium-8 columns content">
    <h3><?= __('Delivery Orders Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('delivery_order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deliveryOrdersItems as $deliveryOrdersItem): ?>
            <tr>
                <td><?= $deliveryOrdersItem->has('delivery_order') ? $this->Html->link($deliveryOrdersItem->delivery_order->id, ['controller' => 'DeliveryOrders', 'action' => 'view', $deliveryOrdersItem->delivery_order->id]) : '' ?></td>
                <td><?= $deliveryOrdersItem->has('item') ? $this->Html->link($deliveryOrdersItem->item->name, ['controller' => 'Items', 'action' => 'view', $deliveryOrdersItem->item->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $deliveryOrdersItem->delivery_order_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deliveryOrdersItem->delivery_order_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deliveryOrdersItem->delivery_order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryOrdersItem->delivery_order_id)]) ?>
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
