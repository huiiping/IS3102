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
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
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
            <th scope="row"><?= __('Supplier') ?></th>
            <td><?= $transferOrder->has('supplier') ? $this->Html->link($transferOrder->supplier->supplier_name, ['controller' => 'Suppliers', 'action' => 'view', $transferOrder->supplier->id]) : '' ?></td>
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
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($transferOrder->created) ?></td>
        </tr>
        <?php if (!empty($transferOrder->items)): ?>
          <?php foreach ($transferOrder->items as $item): ?>
            <p class="text-muted text-center">
                <?= $this->Html->link(__(h($item->name)), ['controller' => 'Items', 'action' => 'view', $item->id], ['title' => 'View Item Details']) ?>
            </p>
          <?php endforeach; ?>
          <?php endif; ?>
    </table>
</div>
