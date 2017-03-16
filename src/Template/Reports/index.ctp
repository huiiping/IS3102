<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Report'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Delivery Orders'), ['controller' => 'DeliveryOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Delivery Order'), ['controller' => 'DeliveryOrders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reports index large-9 medium-8 columns content">
    <h3><?= __('Reports') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplier_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delivery_order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('message') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reports as $report): ?>
            <tr>
                <td><?= $this->Number->format($report->id) ?></td>
                <td><?= $report->has('retailer_employee') ? $this->Html->link($report->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $report->retailer_employee->id]) : '' ?></td>
                <td><?= $report->has('location') ? $this->Html->link($report->location->name, ['controller' => 'Locations', 'action' => 'view', $report->location->id]) : '' ?></td>
                <td><?= $report->has('supplier') ? $this->Html->link($report->supplier->supplier_name, ['controller' => 'Suppliers', 'action' => 'view', $report->supplier->id]) : '' ?></td>
                <td><?= $report->has('delivery_order') ? $this->Html->link($report->delivery_order->id, ['controller' => 'DeliveryOrders', 'action' => 'view', $report->delivery_order->id]) : '' ?></td>
                <td><?= $this->Number->format($report->item_id) ?></td>
                <td><?= h($report->title) ?></td>
                <td><?= h($report->message) ?></td>
                <td><?= h($report->status) ?></td>
                <td><?= h($report->modified) ?></td>
                <td><?= h($report->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $report->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $report->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $report->id], ['confirm' => __('Are you sure you want to delete # {0}?', $report->id)]) ?>
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
