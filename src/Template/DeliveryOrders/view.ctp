<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Delivery Order'), ['action' => 'edit', $deliveryOrder->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Delivery Order'), ['action' => 'delete', $deliveryOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryOrder->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Delivery Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Delivery Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Delivery Order Items'), ['controller' => 'DeliveryOrderItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Delivery Order Item'), ['controller' => 'DeliveryOrderItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deliveryOrders view large-9 medium-8 columns content">
    <h3><?= h($deliveryOrder->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($deliveryOrder->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Currency') ?></th>
            <td><?= h($deliveryOrder->currency) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deliverer') ?></th>
            <td><?= h($deliveryOrder->deliverer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $deliveryOrder->has('customer') ? $this->Html->link($deliveryOrder->customer->id, ['controller' => 'Customers', 'action' => 'view', $deliveryOrder->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retailer Employee') ?></th>
            <td><?= $deliveryOrder->has('retailer_employee') ? $this->Html->link($deliveryOrder->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $deliveryOrder->retailer_employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $deliveryOrder->has('location') ? $this->Html->link($deliveryOrder->location->name, ['controller' => 'Locations', 'action' => 'view', $deliveryOrder->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($deliveryOrder->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fee') ?></th>
            <td><?= $this->Number->format($deliveryOrder->fee) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Id') ?></th>
            <td><?= $this->Number->format($deliveryOrder->transaction_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($deliveryOrder->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($deliveryOrder->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Transactions') ?></h4>
        <?php if (!empty($deliveryOrder->transactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Remarks') ?></th>
                <th scope="col"><?= __('ReceiptID') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Retailer Employee Id') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($deliveryOrder->transactions as $transactions): ?>
            <tr>
                <td><?= h($transactions->id) ?></td>
                <td><?= h($transactions->status) ?></td>
                <td><?= h($transactions->remarks) ?></td>
                <td><?= h($transactions->receiptID) ?></td>
                <td><?= h($transactions->customer_id) ?></td>
                <td><?= h($transactions->retailer_employee_id) ?></td>
                <td><?= h($transactions->location_id) ?></td>
                <td><?= h($transactions->modified) ?></td>
                <td><?= h($transactions->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Transactions', 'action' => 'view', $transactions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Transactions', 'action' => 'edit', $transactions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactions', 'action' => 'delete', $transactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Delivery Order Items') ?></h4>
        <?php if (!empty($deliveryOrder->delivery_order_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('ItemID') ?></th>
                <th scope="col"><?= __('EPC') ?></th>
                <th scope="col"><?= __('Barcode') ?></th>
                <th scope="col"><?= __('Delivery Order Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($deliveryOrder->delivery_order_items as $deliveryOrderItems): ?>
            <tr>
                <td><?= h($deliveryOrderItems->id) ?></td>
                <td><?= h($deliveryOrderItems->itemID) ?></td>
                <td><?= h($deliveryOrderItems->EPC) ?></td>
                <td><?= h($deliveryOrderItems->barcode) ?></td>
                <td><?= h($deliveryOrderItems->delivery_order_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DeliveryOrderItems', 'action' => 'view', $deliveryOrderItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DeliveryOrderItems', 'action' => 'edit', $deliveryOrderItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DeliveryOrderItems', 'action' => 'delete', $deliveryOrderItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryOrderItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
