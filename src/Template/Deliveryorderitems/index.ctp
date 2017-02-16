<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Deliveryorderitem'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Deliveryorders'), ['controller' => 'Deliveryorders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deliveryorder'), ['controller' => 'Deliveryorders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deliveryorderitems index large-9 medium-8 columns content">
    <h3><?= __('Deliveryorderitems') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ECP') ?></th>
                <th scope="col"><?= $this->Paginator->sort('barcode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deliveryOrder_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deliveryorderitems as $deliveryorderitem): ?>
            <tr>
                <td><?= $this->Number->format($deliveryorderitem->id) ?></td>
                <td><?= $deliveryorderitem->has('item') ? $this->Html->link($deliveryorderitem->item->id, ['controller' => 'Items', 'action' => 'view', $deliveryorderitem->item->id]) : '' ?></td>
                <td><?= h($deliveryorderitem->ECP) ?></td>
                <td><?= h($deliveryorderitem->barcode) ?></td>
                <td><?= $this->Number->format($deliveryorderitem->quantity) ?></td>
                <td><?= $deliveryorderitem->has('deliveryorder') ? $this->Html->link($deliveryorderitem->deliveryorder->id, ['controller' => 'Deliveryorders', 'action' => 'view', $deliveryorderitem->deliveryorder->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $deliveryorderitem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deliveryorderitem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deliveryorderitem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryorderitem->id)]) ?>
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
