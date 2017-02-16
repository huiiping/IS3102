<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Suppliermemo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="suppliermemos index large-9 medium-8 columns content">
    <h3><?= __('Suppliermemos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remarks') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplier_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailerEmployee_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($suppliermemos as $suppliermemo): ?>
            <tr>
                <td><?= $this->Number->format($suppliermemo->id) ?></td>
                <td><?= h($suppliermemo->remarks) ?></td>
                <td><?= h($suppliermemo->created) ?></td>
                <td><?= $suppliermemo->has('supplier') ? $this->Html->link($suppliermemo->supplier->id, ['controller' => 'Suppliers', 'action' => 'view', $suppliermemo->supplier->id]) : '' ?></td>
                <td><?= $suppliermemo->has('retaileremployee') ? $this->Html->link($suppliermemo->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $suppliermemo->retaileremployee->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $suppliermemo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $suppliermemo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $suppliermemo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suppliermemo->id)]) ?>
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
