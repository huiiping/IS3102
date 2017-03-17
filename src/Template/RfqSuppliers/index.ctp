<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rfq Supplier'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rfqs'), ['controller' => 'Rfqs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rfq'), ['controller' => 'Rfqs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rfqSuppliers index large-9 medium-8 columns content">
    <h3><?= __('Rfq Suppliers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('rfq_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplier_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rfqSuppliers as $rfqSupplier): ?>
            <tr>
                <td><?= $rfqSupplier->has('rfq') ? $this->Html->link($rfqSupplier->rfq->title, ['controller' => 'Rfqs', 'action' => 'view', $rfqSupplier->rfq->id]) : '' ?></td>
                <td><?= $rfqSupplier->has('supplier') ? $this->Html->link($rfqSupplier->supplier->supplier_name, ['controller' => 'Suppliers', 'action' => 'view', $rfqSupplier->supplier->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rfqSupplier->rfq_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rfqSupplier->rfq_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rfqSupplier->rfq_id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfqSupplier->rfq_id)]) ?>
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
