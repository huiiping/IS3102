<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Transfer Orders Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transfer Orders'), ['controller' => 'TransferOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transfer Order'), ['controller' => 'TransferOrders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transferOrdersItems index large-9 medium-8 columns content">
    <h3><?= __('Transfer Orders Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('transfer_order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transferOrdersItems as $transferOrdersItem): ?>
            <tr>
                <td><?= $transferOrdersItem->has('transfer_order') ? $this->Html->link($transferOrdersItem->transfer_order->id, ['controller' => 'TransferOrders', 'action' => 'view', $transferOrdersItem->transfer_order->id]) : '' ?></td>
                <td><?= $transferOrdersItem->has('item') ? $this->Html->link($transferOrdersItem->item->name, ['controller' => 'Items', 'action' => 'view', $transferOrdersItem->item->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $transferOrdersItem->transfer_order_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transferOrdersItem->transfer_order_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transferOrdersItem->transfer_order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferOrdersItem->transfer_order_id)]) ?>
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
