<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="supplier index large-9 medium-8 columns content">
    <h3><?= __('Supplier') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('supplierId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplierName') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($supplier as $supplier): ?>
            <tr>
                <td><?= $this->Number->format($supplier->supplierId) ?></td>
                <td><?= h($supplier->supplierName) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $supplier->supplierId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplier->supplierId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplier->supplierId], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->supplierId)]) ?>
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
