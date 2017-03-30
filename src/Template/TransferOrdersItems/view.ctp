<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transfer Orders Item'), ['action' => 'edit', $transferOrdersItem->transfer_order_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transfer Orders Item'), ['action' => 'delete', $transferOrdersItem->transfer_order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferOrdersItem->transfer_order_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transfer Orders Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transfer Orders Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transfer Orders'), ['controller' => 'TransferOrders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transfer Order'), ['controller' => 'TransferOrders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transferOrdersItems view large-9 medium-8 columns content">
    <h3><?= h($transferOrdersItem->transfer_order_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Transfer Order') ?></th>
            <td><?= $transferOrdersItem->has('transfer_order') ? $this->Html->link($transferOrdersItem->transfer_order->id, ['controller' => 'TransferOrders', 'action' => 'view', $transferOrdersItem->transfer_order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $transferOrdersItem->has('item') ? $this->Html->link($transferOrdersItem->item->name, ['controller' => 'Items', 'action' => 'view', $transferOrdersItem->item->id]) : '' ?></td>
        </tr>
    </table>
</div>
