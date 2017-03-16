<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stock Level'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stockLevels index large-9 medium-8 columns content">
    <h3><?= __('Stock Levels') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('threshold') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stockLevels as $stockLevel): ?>
            <tr>
                <td><?= $this->Number->format($stockLevel->id) ?></td>
                <td><?= $stockLevel->has('location') ? $this->Html->link($stockLevel->location->name, ['controller' => 'Locations', 'action' => 'view', $stockLevel->location->id]) : '' ?></td>
                <td><?= $stockLevel->has('product') ? $this->Html->link($stockLevel->product->id, ['controller' => 'Products', 'action' => 'view', $stockLevel->product->id]) : '' ?></td>
                <td><?= $this->Number->format($stockLevel->threshold) ?></td>
                <td><?= h($stockLevel->status) ?></td>
                <td><?= $stockLevel->has('retailer_employee') ? $this->Html->link($stockLevel->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $stockLevel->retailer_employee->id]) : '' ?></td>
                <td><?= h($stockLevel->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $stockLevel->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stockLevel->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stockLevel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stockLevel->id)]) ?>
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
