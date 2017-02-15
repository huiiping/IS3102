<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Prodtype'), ['action' => 'edit', $prodtype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Prodtype'), ['action' => 'delete', $prodtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prodtype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Prodtypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prodtype'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prodcats'), ['controller' => 'Prodcats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prodcat'), ['controller' => 'Prodcats', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="prodtypes view large-9 medium-8 columns content">
    <h3><?= h($prodtype->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ProdName') ?></th>
            <td><?= h($prodtype->prodName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Colour') ?></th>
            <td><?= h($prodtype->colour) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dimension') ?></th>
            <td><?= h($prodtype->dimension) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SKU') ?></th>
            <td><?= h($prodtype->SKU) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retaileremployee') ?></th>
            <td><?= $prodtype->has('retaileremployee') ? $this->Html->link($prodtype->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $prodtype->retaileremployee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prodcat') ?></th>
            <td><?= $prodtype->has('prodcat') ? $this->Html->link($prodtype->prodcat->id, ['controller' => 'Prodcats', 'action' => 'view', $prodtype->prodcat->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($prodtype->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StoreUnitPrice') ?></th>
            <td><?= $this->Number->format($prodtype->storeUnitPrice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('WebStoreUnitPrice') ?></th>
            <td><?= $this->Number->format($prodtype->webStoreUnitPrice) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('ProdDesc') ?></h4>
        <?= $this->Text->autoParagraph(h($prodtype->prodDesc)); ?>
    </div>
</div>
