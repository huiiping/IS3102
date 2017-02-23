<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Purchase Orders'), ['controller' => 'PurchaseOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchase Order'), ['controller' => 'PurchaseOrders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Supplier Memos'), ['controller' => 'SupplierMemos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier Memo'), ['controller' => 'SupplierMemos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employee Roles'), ['controller' => 'RetailerEmployeeRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee Role'), ['controller' => 'RetailerEmployeeRoles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retailerEmployees index large-9 medium-8 columns content">
    <h3><?= __('Retailer Employees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activation_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activation_token') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recovery_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recovery_token') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($retailerEmployees as $retailerEmployee): ?>
            <tr>
                <td><?= $this->Number->format($retailerEmployee->id) ?></td>
                <td><?= h($retailerEmployee->username) ?></td>
                <td><?= h($retailerEmployee->password) ?></td>
                <td><?= h($retailerEmployee->email) ?></td>
                <td><?= h($retailerEmployee->address) ?></td>
                <td><?= h($retailerEmployee->contact) ?></td>
                <td><?= h($retailerEmployee->created) ?></td>
                <td><?= h($retailerEmployee->modified) ?></td>
                <td><?= h($retailerEmployee->first_name) ?></td>
                <td><?= h($retailerEmployee->last_name) ?></td>
                <td><?= h($retailerEmployee->activation_status) ?></td>
                <td><?= h($retailerEmployee->activation_token) ?></td>
                <td><?= h($retailerEmployee->recovery_status) ?></td>
                <td><?= h($retailerEmployee->recovery_token) ?></td>
                <td><?= $retailerEmployee->has('location') ? $this->Html->link($retailerEmployee->location->name, ['controller' => 'Locations', 'action' => 'view', $retailerEmployee->location->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $retailerEmployee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $retailerEmployee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $retailerEmployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerEmployee->id)]) ?>
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
