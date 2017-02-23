<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Retailer Acc Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailers'), ['controller' => 'Retailers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer'), ['controller' => 'Retailers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retailerAccTypes index large-9 medium-8 columns content">
    <h3><?= __('Retailer Acc Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num_of_users') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num_of_warehouses') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num_of_stores') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num_of_product_types') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($retailerAccTypes as $retailerAccType): ?>
            <tr>
                <td><?= $this->Number->format($retailerAccType->id) ?></td>
                <td><?= h($retailerAccType->name) ?></td>
                <td><?= $this->Number->format($retailerAccType->num_of_users) ?></td>
                <td><?= $this->Number->format($retailerAccType->num_of_warehouses) ?></td>
                <td><?= $this->Number->format($retailerAccType->num_of_stores) ?></td>
                <td><?= $this->Number->format($retailerAccType->num_of_product_types) ?></td>
                <td><?= h($retailerAccType->created) ?></td>
                <td><?= h($retailerAccType->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $retailerAccType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $retailerAccType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $retailerAccType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerAccType->id)]) ?>
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
