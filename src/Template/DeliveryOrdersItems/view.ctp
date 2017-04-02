<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Delivery Orders Item'), ['action' => 'edit', $deliveryOrdersItem->delivery_order_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Delivery Orders Item'), ['action' => 'delete', $deliveryOrdersItem->delivery_order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryOrdersItem->delivery_order_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Delivery Orders Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Delivery Orders Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Delivery Orders'), ['controller' => 'DeliveryOrders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Delivery Order'), ['controller' => 'DeliveryOrders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deliveryOrdersItems view large-9 medium-8 columns content">
    <h3><?= h($deliveryOrdersItem->delivery_order_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Delivery Order') ?></th>
            <td><?= $deliveryOrdersItem->has('delivery_order') ? $this->Html->link($deliveryOrdersItem->delivery_order->id, ['controller' => 'DeliveryOrders', 'action' => 'view', $deliveryOrdersItem->delivery_order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $deliveryOrdersItem->has('item') ? $this->Html->link($deliveryOrdersItem->item->name, ['controller' => 'Items', 'action' => 'view', $deliveryOrdersItem->item->id]) : '' ?></td>
        </tr>
    </table>
</div>
