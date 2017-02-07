<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Productcategory'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productcategory index large-9 medium-8 columns content">
    <h3><?= __('Productcategory') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('productCatId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('productName') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productcategory as $productcategory): ?>
            <tr>
                <td><?= $this->Number->format($productcategory->productCatId) ?></td>
                <td><?= h($productcategory->productName) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productcategory->productCatId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productcategory->productCatId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productcategory->productCatId], ['confirm' => __('Are you sure you want to delete # {0}?', $productcategory->productCatId)]) ?>
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
