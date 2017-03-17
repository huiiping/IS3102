<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rfqs Supplier'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rfqs'), ['controller' => 'Rfqs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rfq'), ['controller' => 'Rfqs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rfqsSuppliers index large-9 medium-8 columns content">
    <h3><?= __('Rfqs Suppliers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('rfq_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplier_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rfqsSuppliers as $rfqsSupplier): ?>
            <tr>
                <td><?= $rfqsSupplier->has('rfq') ? $this->Html->link($rfqsSupplier->rfq->title, ['controller' => 'Rfqs', 'action' => 'view', $rfqsSupplier->rfq->id]) : '' ?></td>
                <td><?= $rfqsSupplier->has('supplier') ? $this->Html->link($rfqsSupplier->supplier->supplier_name, ['controller' => 'Suppliers', 'action' => 'view', $rfqsSupplier->supplier->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rfqsSupplier->rfq_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rfqsSupplier->rfq_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rfqsSupplier->rfq_id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfqsSupplier->rfq_id)]) ?>
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
