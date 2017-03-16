<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Delivery Order Item'), ['action' => 'edit', $deliveryOrderItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Delivery Order Item'), ['action' => 'delete', $deliveryOrderItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryOrderItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Delivery Order Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Delivery Order Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Delivery Orders'), ['controller' => 'DeliveryOrders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Delivery Order'), ['controller' => 'DeliveryOrders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deliveryOrderItems view large-9 medium-8 columns content">
    <h3><?= h($deliveryOrderItem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Delivery Order') ?></th>
            <td><?= $deliveryOrderItem->has('delivery_order') ? $this->Html->link($deliveryOrderItem->delivery_order->id, ['controller' => 'DeliveryOrders', 'action' => 'view', $deliveryOrderItem->delivery_order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item Id') ?></th>
            <td><?= $this->Number->format($deliveryOrderItem->item_id) ?></td>
        </tr>
    </table>
</div>
