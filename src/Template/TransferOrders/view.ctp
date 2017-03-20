<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transfer Order'), ['action' => 'edit', $transferOrder->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transfer Order'), ['action' => 'delete', $transferOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferOrder->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transfer Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transfer Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transfer Order Items'), ['controller' => 'TransferOrderItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transfer Order Item'), ['controller' => 'TransferOrderItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transferOrders view large-9 medium-8 columns content">
    <h3><?= h($transferOrder->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($transferOrder->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remarks') ?></th>
            <td><?= h($transferOrder->remarks) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retailer Employee') ?></th>
            <td><?= $transferOrder->has('retailer_employee') ? $this->Html->link($transferOrder->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $transferOrder->retailer_employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($transferOrder->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LocationFrom') ?></th>
            <td><?= $this->Number->format($transferOrder->locationFrom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LocationTo') ?></th>
            <td><?= $this->Number->format($transferOrder->locationTo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier Id') ?></th>
            <td><?= $this->Number->format($transferOrder->supplier_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($transferOrder->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Transfer Order Items') ?></h4>
        <?php if (!empty($transferOrder->transfer_order_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Transfer Order Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($transferOrder->transfer_order_items as $transferOrderItems): ?>
            <tr>
                <td><?= h($transferOrderItems->transfer_order_id) ?></td>
                <td><?= h($transferOrderItems->item_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TransferOrderItems', 'action' => 'view', $transferOrderItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TransferOrderItems', 'action' => 'edit', $transferOrderItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TransferOrderItems', 'action' => 'delete', $transferOrderItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferOrderItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
