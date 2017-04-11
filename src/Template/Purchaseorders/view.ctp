<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="purchaseOrders view large-9 medium-8 columns content">
    <h3><?= h($purchaseOrder->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('File Name') ?></th>
            <td><?= h($purchaseOrder->file_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File Path') ?></th>
            <td><?= h($purchaseOrder->file_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approval Status') ?></th>
            <td><?= h($purchaseOrder->approval_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier') ?></th>
            <td><?= $purchaseOrder->has('supplier') ? $this->Html->link($purchaseOrder->supplier->supplier_name, ['controller' => 'Suppliers', 'action' => 'view', $purchaseOrder->supplier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quotation') ?></th>
            <td><?= $purchaseOrder->has('quotation') ? $this->Html->link($purchaseOrder->quotation->id, ['controller' => 'Quotations', 'action' => 'view', $purchaseOrder->quotation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $purchaseOrder->has('location') ? $this->Html->link($purchaseOrder->location->name, ['controller' => 'Locations', 'action' => 'view', $purchaseOrder->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($purchaseOrder->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retailer Employee Id') ?></th>
            <td><?= $this->Number->format($purchaseOrder->retailer_employee_id) ?></td>
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
                <th scope="col"><?= __('ItemID') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Unit Price') ?></th>
                <th scope="col"><?= __('Purchase Order Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($purchaseOrder->purchase_order_items as $purchaseOrderItems): ?>
            <tr>
                <td><?= h($purchaseOrderItems->id) ?></td>
                <td><?= h($purchaseOrderItems->itemID) ?></td>
                <td><?= h($purchaseOrderItems->description) ?></td>
                <td><?= h($purchaseOrderItems->quantity) ?></td>
                <td><?= h($purchaseOrderItems->unit_price) ?></td>
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
