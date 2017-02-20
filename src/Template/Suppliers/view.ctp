<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Supplier'), ['action' => 'edit', $supplier->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Supplier'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Purchase Orders'), ['controller' => 'PurchaseOrders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase Order'), ['controller' => 'PurchaseOrders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Supplier Memos'), ['controller' => 'SupplierMemos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier Memo'), ['controller' => 'SupplierMemos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="suppliers view large-9 medium-8 columns content">
    <h3><?= h($supplier->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($supplier->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($supplier->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($supplier->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($supplier->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= h($supplier->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier Name') ?></th>
            <td><?= h($supplier->supplier_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($supplier->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account Status') ?></th>
            <td><?= h($supplier->account_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bank Acc') ?></th>
            <td><?= h($supplier->bank_acc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($supplier->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($supplier->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($supplier->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Purchase Orders') ?></h4>
        <?php if (!empty($supplier->purchase_orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Total Price') ?></th>
                <th scope="col"><?= __('Delivery Status') ?></th>
                <th scope="col"><?= __('Supplier Id') ?></th>
                <th scope="col"><?= __('Retailer Employee Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($supplier->purchase_orders as $purchaseOrders): ?>
            <tr>
                <td><?= h($purchaseOrders->id) ?></td>
                <td><?= h($purchaseOrders->created) ?></td>
                <td><?= h($purchaseOrders->total_price) ?></td>
                <td><?= h($purchaseOrders->delivery_status) ?></td>
                <td><?= h($purchaseOrders->supplier_id) ?></td>
                <td><?= h($purchaseOrders->retailer_employee_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PurchaseOrders', 'action' => 'view', $purchaseOrders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseOrders', 'action' => 'edit', $purchaseOrders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseOrders', 'action' => 'delete', $purchaseOrders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Supplier Memos') ?></h4>
        <?php if (!empty($supplier->supplier_memos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Remarks') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Supplier Id') ?></th>
                <th scope="col"><?= __('Retailer Employee Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($supplier->supplier_memos as $supplierMemos): ?>
            <tr>
                <td><?= h($supplierMemos->id) ?></td>
                <td><?= h($supplierMemos->remarks) ?></td>
                <td><?= h($supplierMemos->created) ?></td>
                <td><?= h($supplierMemos->supplier_id) ?></td>
                <td><?= h($supplierMemos->retailer_employee_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SupplierMemos', 'action' => 'view', $supplierMemos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SupplierMemos', 'action' => 'edit', $supplierMemos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SupplierMemos', 'action' => 'delete', $supplierMemos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierMemos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
