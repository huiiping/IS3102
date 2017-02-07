<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->itemId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->itemId], ['confirm' => __('Are you sure you want to delete # {0}?', $item->itemId)]) ?> </li>
        <li><?= $this->Html->link(__('List Item'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="item view large-9 medium-8 columns content">
    <h3><?= h($item->itemId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('EPC') ?></th>
            <td><?= h($item->EPC) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Barcode') ?></th>
            <td><?= h($item->barcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ItemStatus') ?></th>
            <td><?= h($item->itemStatus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ItemId') ?></th>
            <td><?= $this->Number->format($item->itemId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProductCategoryId') ?></th>
            <td><?= $this->Number->format($item->productCategoryId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProductTypeId') ?></th>
            <td><?= $this->Number->format($item->productTypeId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LocationId') ?></th>
            <td><?= $this->Number->format($item->locationId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IsDefective') ?></th>
            <td><?= $item->isDefective ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('ItemDesc') ?></h4>
        <?= $this->Text->autoParagraph(h($item->itemDesc)); ?>
    </div>
</div>
