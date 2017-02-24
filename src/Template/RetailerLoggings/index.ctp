<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Retailer Logging'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retailerLoggings index large-9 medium-8 columns content">
    <h3><?= __('Retailer Loggings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('action') ?></th>
                <th scope="col"><?= $this->Paginator->sort('entity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('entityid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($retailerLoggings as $retailerLogging): ?>
            <tr>
                <td><?= $this->Number->format($retailerLogging->id) ?></td>
                <td><?= h($retailerLogging->action) ?></td>
                <td><?= h($retailerLogging->entity) ?></td>
                <td><?= $this->Number->format($retailerLogging->entityid) ?></td>
                <td><?= $retailerLogging->has('retailer_employee') ? $this->Html->link($retailerLogging->retailer_employee->id, ['controller' => 'RetailerEmployees', 'action' => 'view', $retailerLogging->retailer_employee->id]) : '' ?></td>
                <td><?= h($retailerLogging->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $retailerLogging->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $retailerLogging->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $retailerLogging->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerLogging->id)]) ?>
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
