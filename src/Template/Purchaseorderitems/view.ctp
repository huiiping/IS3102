<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Purchaseorderitem'), ['action' => 'edit', $purchaseorderitem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Purchaseorderitem'), ['action' => 'delete', $purchaseorderitem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseorderitem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Purchaseorderitems'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchaseorderitem'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Purchaseorders'), ['controller' => 'Purchaseorders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchaseorder'), ['controller' => 'Purchaseorders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="purchaseorderitems view large-9 medium-8 columns content">
    <h3><?= h($purchaseorderitem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Purchaseorder') ?></th>
            <td><?= $purchaseorderitem->has('purchaseorder') ? $this->Html->link($purchaseorderitem->purchaseorder->id, ['controller' => 'Purchaseorders', 'action' => 'view', $purchaseorderitem->purchaseorder->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($purchaseorderitem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProductTypeID') ?></th>
            <td><?= $this->Number->format($purchaseorderitem->productTypeID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($purchaseorderitem->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UnitPrice') ?></th>
            <td><?= $this->Number->format($purchaseorderitem->unitPrice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SubTotalPrice') ?></th>
            <td><?= $this->Number->format($purchaseorderitem->subTotalPrice) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('ItemDesc') ?></h4>
        <?= $this->Text->autoParagraph(h($purchaseorderitem->itemDesc)); ?>
    </div>
</div>
