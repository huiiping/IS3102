<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stocklevel'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prodtypes'), ['controller' => 'Prodtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prodtype'), ['controller' => 'Prodtypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stocklevels index large-9 medium-8 columns content">
    <h3><?= __('Stocklevels') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('minThresholdLevel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('triggered') ?></th>
                <th scope="col"><?= $this->Paginator->sort('receiver') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prodType_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stocklevels as $stocklevel): ?>
            <tr>
                <td><?= $this->Number->format($stocklevel->id) ?></td>
                <td><?= $this->Number->format($stocklevel->minThresholdLevel) ?></td>
                <td><?= h($stocklevel->triggered) ?></td>
                <td><?= h($stocklevel->receiver) ?></td>
                <td><?= $stocklevel->has('location') ? $this->Html->link($stocklevel->location->name, ['controller' => 'Locations', 'action' => 'view', $stocklevel->location->id]) : '' ?></td>
                <td><?= $stocklevel->has('prodtype') ? $this->Html->link($stocklevel->prodtype->id, ['controller' => 'Prodtypes', 'action' => 'view', $stocklevel->prodtype->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $stocklevel->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stocklevel->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stocklevel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stocklevel->id)]) ?>
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
