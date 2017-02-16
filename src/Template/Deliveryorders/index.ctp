<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Deliveryorder'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deliveryorders index large-9 medium-8 columns content">
    <h3><?= __('Deliveryorders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deliveryStatus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deliveryCharge') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expectedDeliveryDate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('actualDeliveryDate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deliverer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transaction_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deliveryorders as $deliveryorder): ?>
            <tr>
                <td><?= $this->Number->format($deliveryorder->id) ?></td>
                <td><?= h($deliveryorder->deliveryStatus) ?></td>
                <td><?= $this->Number->format($deliveryorder->deliveryCharge) ?></td>
                <td><?= h($deliveryorder->expectedDeliveryDate) ?></td>
                <td><?= h($deliveryorder->actualDeliveryDate) ?></td>
                <td><?= h($deliveryorder->deliverer) ?></td>
                <td><?= $deliveryorder->has('transaction') ? $this->Html->link($deliveryorder->transaction->id, ['controller' => 'Transactions', 'action' => 'view', $deliveryorder->transaction->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $deliveryorder->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deliveryorder->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deliveryorder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryorder->id)]) ?>
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
