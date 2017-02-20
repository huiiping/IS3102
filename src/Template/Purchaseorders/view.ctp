<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Purchase Order'), ['action' => 'edit', $purchaseOrder->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Purchase Order'), ['action' => 'delete', $purchaseOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrder->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Purchase Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Purchase Order Items'), ['controller' => 'PurchaseOrderItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase Order Item'), ['controller' => 'PurchaseOrderItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="purchaseOrders view large-9 medium-8 columns content">
    <h3><?= h($purchaseOrder->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Supplier') ?></th>
            <td><?= $purchaseOrder->has('supplier') ? $this->Html->link($purchaseOrder->supplier->id, ['controller' => 'Suppliers', 'action' => 'view', $purchaseOrder->supplier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retailer Employee') ?></th>
            <td><?= $purchaseOrder->has('retailer_employee') ? $this->Html->link($purchaseOrder->retailer_employee->id, ['controller' => 'RetailerEmployees', 'action' => 'view', $purchaseOrder->retailer_employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($purchaseOrder->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Price') ?></th>
            <td><?= $this->Number->format($purchaseOrder->total_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($purchaseOrder->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delivery Status') ?></th>
            <td><?= $purchaseOrder->delivery_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Purchase Order Items') ?></h4>
        <?php if (!empty($purchaseOrder->purchase_order_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Item ID') ?></th>
                <th scope="col"><?= __('Item Name') ?></th>
                <th scope="col"><?= __('Item Desc') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Unit Price') ?></th>
                <th scope="col"><?= __('Sub Total Price') ?></th>
                <th scope="col"><?= __('Purchase Order Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($purchaseOrder->purchase_order_items as $purchaseOrderItems): ?>
            <tr>
                <td><?= h($purchaseOrderItems->id) ?></td>
                <td><?= h($purchaseOrderItems->item_ID) ?></td>
                <td><?= h($purchaseOrderItems->item_name) ?></td>
                <td><?= h($purchaseOrderItems->item_desc) ?></td>
                <td><?= h($purchaseOrderItems->quantity) ?></td>
                <td><?= h($purchaseOrderItems->unit_price) ?></td>
                <td><?= h($purchaseOrderItems->sub_total_price) ?></td>
                <td><?= h($purchaseOrderItems->purchase_order_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PurchaseOrderItems', 'action' => 'view', $purchaseOrderItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseOrderItems', 'action' => 'edit', $purchaseOrderItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseOrderItems', 'action' => 'delete', $purchaseOrderItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrderItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
