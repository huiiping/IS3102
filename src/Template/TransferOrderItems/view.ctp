<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transfer Order Item'), ['action' => 'edit', $transferOrderItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transfer Order Item'), ['action' => 'delete', $transferOrderItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferOrderItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transfer Order Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transfer Order Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transfer Orders'), ['controller' => 'TransferOrders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transfer Order'), ['controller' => 'TransferOrders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transferOrderItems view large-9 medium-8 columns content">
    <h3><?= h($transferOrderItem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ItemID') ?></th>
            <td><?= h($transferOrderItem->itemID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EPC') ?></th>
            <td><?= h($transferOrderItem->EPC) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Barcode') ?></th>
            <td><?= h($transferOrderItem->barcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transfer Order') ?></th>
            <td><?= $transferOrderItem->has('transfer_order') ? $this->Html->link($transferOrderItem->transfer_order->id, ['controller' => 'TransferOrders', 'action' => 'view', $transferOrderItem->transfer_order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($transferOrderItem->id) ?></td>
        </tr>
    </table>
</div>
