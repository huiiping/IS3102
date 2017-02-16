<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Deliveryorderitem'), ['action' => 'edit', $deliveryorderitem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Deliveryorderitem'), ['action' => 'delete', $deliveryorderitem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryorderitem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Deliveryorderitems'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deliveryorderitem'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Deliveryorders'), ['controller' => 'Deliveryorders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deliveryorder'), ['controller' => 'Deliveryorders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deliveryorderitems view large-9 medium-8 columns content">
    <h3><?= h($deliveryorderitem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $deliveryorderitem->has('item') ? $this->Html->link($deliveryorderitem->item->id, ['controller' => 'Items', 'action' => 'view', $deliveryorderitem->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ECP') ?></th>
            <td><?= h($deliveryorderitem->ECP) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Barcode') ?></th>
            <td><?= h($deliveryorderitem->barcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deliveryorder') ?></th>
            <td><?= $deliveryorderitem->has('deliveryorder') ? $this->Html->link($deliveryorderitem->deliveryorder->id, ['controller' => 'Deliveryorders', 'action' => 'view', $deliveryorderitem->deliveryorder->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($deliveryorderitem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($deliveryorderitem->quantity) ?></td>
        </tr>
    </table>
</div>
