<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Delivery Order'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Delivery Order Items'), ['controller' => 'DeliveryOrderItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Delivery Order Item'), ['controller' => 'DeliveryOrderItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deliveryOrders index large-9 medium-8 columns content">
    <h3><?= __('Delivery Orders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fee') ?></th>
                <th scope="col"><?= $this->Paginator->sort('currency') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deliverer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transaction_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deliveryOrders as $deliveryOrder): ?>
            <tr>
                <td><?= $this->Number->format($deliveryOrder->id) ?></td>
                <td><?= h($deliveryOrder->status) ?></td>
                <td><?= $this->Number->format($deliveryOrder->fee) ?></td>
                <td><?= h($deliveryOrder->currency) ?></td>
                <td><?= h($deliveryOrder->deliverer) ?></td>
                <td><?= $deliveryOrder->has('customer') ? $this->Html->link($deliveryOrder->customer->id, ['controller' => 'Customers', 'action' => 'view', $deliveryOrder->customer->id]) : '' ?></td>
                <td><?= $deliveryOrder->has('retailer_employee') ? $this->Html->link($deliveryOrder->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $deliveryOrder->retailer_employee->id]) : '' ?></td>
                <td><?= $deliveryOrder->has('location') ? $this->Html->link($deliveryOrder->location->name, ['controller' => 'Locations', 'action' => 'view', $deliveryOrder->location->id]) : '' ?></td>
                <td><?= $this->Number->format($deliveryOrder->transaction_id) ?></td>
                <td><?= h($deliveryOrder->modified) ?></td>
                <td><?= h($deliveryOrder->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $deliveryOrder->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deliveryOrder->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deliveryOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryOrder->id)]) ?>
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
