<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Purchaseorders'), ['controller' => 'Purchaseorders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchaseorder'), ['controller' => 'Purchaseorders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliermemos'), ['controller' => 'Suppliermemos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Suppliermemo'), ['controller' => 'Suppliermemos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="suppliers index large-9 medium-8 columns content">
    <h3><?= __('Suppliers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplierName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activationStatus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bankAcc') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($suppliers as $supplier): ?>
            <tr>
                <td><?= $this->Number->format($supplier->id) ?></td>
                <td><?= h($supplier->username) ?></td>
                <td><?= h($supplier->password) ?></td>
                <td><?= h($supplier->email) ?></td>
                <td><?= h($supplier->address) ?></td>
                <td><?= $this->Number->format($supplier->contact) ?></td>
                <td><?= h($supplier->created) ?></td>
                <td><?= h($supplier->modified) ?></td>
                <td><?= h($supplier->supplierName) ?></td>
                <td><?= h($supplier->country) ?></td>
                <td><?= h($supplier->activationStatus) ?></td>
                <td><?= $this->Number->format($supplier->bankAcc) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $supplier->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplier->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?>
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