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
        <li><?= $this->Html->link(__('List Purchaseorders'), ['controller' => 'Purchaseorders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchaseorder'), ['controller' => 'Purchaseorders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliermemos'), ['controller' => 'Suppliermemos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Suppliermemo'), ['controller' => 'Suppliermemos', 'action' => 'add']) ?> </li>
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
            <th scope="row"><?= __('SupplierName') ?></th>
            <td><?= h($supplier->supplierName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($supplier->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AccountStatus') ?></th>
            <td><?= h($supplier->accountStatus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BankAcc') ?></th>
            <td><?= h($supplier->bankAcc) ?></td>
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
        <h4><?= __('Related Purchaseorders') ?></h4>
        <?php if (!empty($supplier->purchaseorders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('TotalPrice') ?></th>
                <th scope="col"><?= __('DeliveryStatus') ?></th>
                <th scope="col"><?= __('Supplier Id') ?></th>
                <th scope="col"><?= __('RetailerEmployee Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($supplier->purchaseorders as $purchaseorders): ?>
            <tr>
                <td><?= h($purchaseorders->id) ?></td>
                <td><?= h($purchaseorders->created) ?></td>
                <td><?= h($purchaseorders->totalPrice) ?></td>
                <td><?= h($purchaseorders->deliveryStatus) ?></td>
                <td><?= h($purchaseorders->supplier_id) ?></td>
                <td><?= h($purchaseorders->retailerEmployee_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Purchaseorders', 'action' => 'view', $purchaseorders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Purchaseorders', 'action' => 'edit', $purchaseorders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Purchaseorders', 'action' => 'delete', $purchaseorders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseorders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Suppliermemos') ?></h4>
        <?php if (!empty($supplier->suppliermemos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Remarks') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Supplier Id') ?></th>
                <th scope="col"><?= __('RetailerEmployee Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($supplier->suppliermemos as $suppliermemos): ?>
            <tr>
                <td><?= h($suppliermemos->id) ?></td>
                <td><?= h($suppliermemos->remarks) ?></td>
                <td><?= h($suppliermemos->created) ?></td>
                <td><?= h($suppliermemos->supplier_id) ?></td>
                <td><?= h($suppliermemos->retailerEmployee_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Suppliermemos', 'action' => 'view', $suppliermemos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Suppliermemos', 'action' => 'edit', $suppliermemos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Suppliermemos', 'action' => 'delete', $suppliermemos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suppliermemos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
