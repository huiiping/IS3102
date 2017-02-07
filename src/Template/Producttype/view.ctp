<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Producttype'), ['action' => 'edit', $producttype->productTypeId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Producttype'), ['action' => 'delete', $producttype->productTypeId], ['confirm' => __('Are you sure you want to delete # {0}?', $producttype->productTypeId)]) ?> </li>
        <li><?= $this->Html->link(__('List Producttype'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Producttype'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="producttype view large-9 medium-8 columns content">
    <h3><?= h($producttype->productTypeId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ProductTypeName') ?></th>
            <td><?= h($producttype->productTypeName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Colour') ?></th>
            <td><?= h($producttype->colour) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SKU') ?></th>
            <td><?= h($producttype->SKU) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProductTypeId') ?></th>
            <td><?= $this->Number->format($producttype->productTypeId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StorePrice') ?></th>
            <td><?= $this->Number->format($producttype->storePrice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('WebstorePrice') ?></th>
            <td><?= $this->Number->format($producttype->webstorePrice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LocationId') ?></th>
            <td><?= $this->Number->format($producttype->locationId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProductCategoryId') ?></th>
            <td><?= $this->Number->format($producttype->productCategoryId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Column 11') ?></th>
            <td><?= $this->Number->format($producttype->column_11) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('ProductTypeDesc') ?></h4>
        <?= $this->Text->autoParagraph(h($producttype->productTypeDesc)); ?>
    </div>
    <div class="row">
        <h4><?= __('Dimension') ?></h4>
        <?= $this->Text->autoParagraph(h($producttype->dimension)); ?>
    </div>
</div>
