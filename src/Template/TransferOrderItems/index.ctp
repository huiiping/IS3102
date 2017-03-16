<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Transfer Order Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transfer Orders'), ['controller' => 'TransferOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transfer Order'), ['controller' => 'TransferOrders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transferOrderItems index large-9 medium-8 columns content">
    <h3><?= __('Transfer Order Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('transfer_order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transferOrderItems as $transferOrderItem): ?>
            <tr>
                <td><?= $transferOrderItem->has('transfer_order') ? $this->Html->link($transferOrderItem->transfer_order->id, ['controller' => 'TransferOrders', 'action' => 'view', $transferOrderItem->transfer_order->id]) : '' ?></td>
                <td><?= $this->Number->format($transferOrderItem->item_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $transferOrderItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transferOrderItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transferOrderItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferOrderItem->id)]) ?>
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
