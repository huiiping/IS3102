<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Producttype'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="producttype index large-9 medium-8 columns content">
    <h3><?= __('Producttype') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('productTypeId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('productTypeName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('colour') ?></th>
                <th scope="col"><?= $this->Paginator->sort('storePrice') ?></th>
                <th scope="col"><?= $this->Paginator->sort('webstorePrice') ?></th>
                <th scope="col"><?= $this->Paginator->sort('SKU') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locationId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('productCategoryId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('column_11') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($producttype as $producttype): ?>
            <tr>
                <td><?= $this->Number->format($producttype->productTypeId) ?></td>
                <td><?= h($producttype->productTypeName) ?></td>
                <td><?= h($producttype->colour) ?></td>
                <td><?= $this->Number->format($producttype->storePrice) ?></td>
                <td><?= $this->Number->format($producttype->webstorePrice) ?></td>
                <td><?= h($producttype->SKU) ?></td>
                <td><?= $this->Number->format($producttype->locationId) ?></td>
                <td><?= $this->Number->format($producttype->productCategoryId) ?></td>
                <td><?= $this->Number->format($producttype->column_11) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $producttype->productTypeId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $producttype->productTypeId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $producttype->productTypeId], ['confirm' => __('Are you sure you want to delete # {0}?', $producttype->productTypeId)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
