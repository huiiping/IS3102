<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stocklevel'), ['action' => 'edit', $stocklevel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stocklevel'), ['action' => 'delete', $stocklevel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stocklevel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stocklevels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stocklevel'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prodtypes'), ['controller' => 'Prodtypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prodtype'), ['controller' => 'Prodtypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stocklevels view large-9 medium-8 columns content">
    <h3><?= h($stocklevel->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Receiver') ?></th>
            <td><?= h($stocklevel->receiver) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $stocklevel->has('location') ? $this->Html->link($stocklevel->location->name, ['controller' => 'Locations', 'action' => 'view', $stocklevel->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prodtype') ?></th>
            <td><?= $stocklevel->has('prodtype') ? $this->Html->link($stocklevel->prodtype->id, ['controller' => 'Prodtypes', 'action' => 'view', $stocklevel->prodtype->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($stocklevel->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MinThresholdLevel') ?></th>
            <td><?= $this->Number->format($stocklevel->minThresholdLevel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Triggered') ?></th>
            <td><?= $stocklevel->triggered ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('NotificationMsg') ?></h4>
        <?= $this->Text->autoParagraph(h($stocklevel->notificationMsg)); ?>
    </div>
</div>
