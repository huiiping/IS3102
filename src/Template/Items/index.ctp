<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prodtypes'), ['controller' => 'Prodtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prodtype'), ['controller' => 'Prodtypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Deliveryorderitems'), ['controller' => 'Deliveryorderitems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deliveryorderitem'), ['controller' => 'Deliveryorderitems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transactionitems'), ['controller' => 'Transactionitems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transactionitem'), ['controller' => 'Transactionitems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transferorderitems'), ['controller' => 'Transferorderitems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transferorderitem'), ['controller' => 'Transferorderitems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="items index large-9 medium-8 columns content">
    <h3><?= __('Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('itemName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EPC') ?></th>
                <th scope="col"><?= $this->Paginator->sort('barcode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('itemStatus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('defective') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prodType_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('section_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $this->Number->format($item->id) ?></td>
                <td><?= h($item->itemName) ?></td>
                <td><?= h($item->EPC) ?></td>
                <td><?= h($item->barcode) ?></td>
                <td><?= h($item->itemStatus) ?></td>
                <td><?= h($item->defective) ?></td>
                <td><?= $item->has('location') ? $this->Html->link($item->location->name, ['controller' => 'Locations', 'action' => 'view', $item->location->id]) : '' ?></td>
                <td><?= $item->has('prodtype') ? $this->Html->link($item->prodtype->id, ['controller' => 'Prodtypes', 'action' => 'view', $item->prodtype->id]) : '' ?></td>
                <td><?= $this->Number->format($item->section_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>
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
