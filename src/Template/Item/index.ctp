<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="item index large-9 medium-8 columns content">
    <h3><?= __('Item') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('itemId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EPC') ?></th>
                <th scope="col"><?= $this->Paginator->sort('barcode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('itemStatus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isDefective') ?></th>
                <th scope="col"><?= $this->Paginator->sort('productCategoryId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('productTypeId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locationId') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($item as $item): ?>
            <tr>
                <td><?= $this->Number->format($item->itemId) ?></td>
                <td><?= h($item->EPC) ?></td>
                <td><?= h($item->barcode) ?></td>
                <td><?= h($item->itemStatus) ?></td>
                <td><?= h($item->isDefective) ?></td>
                <td><?= $this->Number->format($item->productCategoryId) ?></td>
                <td><?= $this->Number->format($item->productTypeId) ?></td>
                <td><?= $this->Number->format($item->locationId) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $item->itemId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->itemId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->itemId], ['confirm' => __('Are you sure you want to delete # {0}?', $item->itemId)]) ?>
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
