<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Transferorderitem'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transferorders'), ['controller' => 'Transferorders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transferorder'), ['controller' => 'Transferorders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transferorderitems index large-9 medium-8 columns content">
    <h3><?= __('Transferorderitems') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ECP') ?></th>
                <th scope="col"><?= $this->Paginator->sort('barcode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transferOrder_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('promotion_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transferorderitems as $transferorderitem): ?>
            <tr>
                <td><?= $this->Number->format($transferorderitem->id) ?></td>
                <td><?= $transferorderitem->has('item') ? $this->Html->link($transferorderitem->item->id, ['controller' => 'Items', 'action' => 'view', $transferorderitem->item->id]) : '' ?></td>
                <td><?= h($transferorderitem->ECP) ?></td>
                <td><?= h($transferorderitem->barcode) ?></td>
                <td><?= $this->Number->format($transferorderitem->quantity) ?></td>
                <td><?= $transferorderitem->has('transferorder') ? $this->Html->link($transferorderitem->transferorder->id, ['controller' => 'Transferorders', 'action' => 'view', $transferorderitem->transferorder->id]) : '' ?></td>
                <td><?= $transferorderitem->has('promotion') ? $this->Html->link($transferorderitem->promotion->id, ['controller' => 'Promotions', 'action' => 'view', $transferorderitem->promotion->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $transferorderitem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transferorderitem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transferorderitem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferorderitem->id)]) ?>
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
