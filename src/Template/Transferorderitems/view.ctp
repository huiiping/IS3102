<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transferorderitem'), ['action' => 'edit', $transferorderitem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transferorderitem'), ['action' => 'delete', $transferorderitem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferorderitem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transferorderitems'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transferorderitem'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transferorders'), ['controller' => 'Transferorders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transferorder'), ['controller' => 'Transferorders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transferorderitems view large-9 medium-8 columns content">
    <h3><?= h($transferorderitem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $transferorderitem->has('item') ? $this->Html->link($transferorderitem->item->id, ['controller' => 'Items', 'action' => 'view', $transferorderitem->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ECP') ?></th>
            <td><?= h($transferorderitem->ECP) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Barcode') ?></th>
            <td><?= h($transferorderitem->barcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transferorder') ?></th>
            <td><?= $transferorderitem->has('transferorder') ? $this->Html->link($transferorderitem->transferorder->id, ['controller' => 'Transferorders', 'action' => 'view', $transferorderitem->transferorder->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promotion') ?></th>
            <td><?= $transferorderitem->has('promotion') ? $this->Html->link($transferorderitem->promotion->id, ['controller' => 'Promotions', 'action' => 'view', $transferorderitem->promotion->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($transferorderitem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($transferorderitem->quantity) ?></td>
        </tr>
    </table>
</div>
