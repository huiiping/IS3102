<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Purchaseorder'), ['action' => 'edit', $purchaseorder->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Purchaseorder'), ['action' => 'delete', $purchaseorder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseorder->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Purchaseorders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchaseorder'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="purchaseorders view large-9 medium-8 columns content">
    <h3><?= h($purchaseorder->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Supplier') ?></th>
            <td><?= $purchaseorder->has('supplier') ? $this->Html->link($purchaseorder->supplier->id, ['controller' => 'Suppliers', 'action' => 'view', $purchaseorder->supplier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retaileremployee') ?></th>
            <td><?= $purchaseorder->has('retaileremployee') ? $this->Html->link($purchaseorder->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $purchaseorder->retaileremployee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($purchaseorder->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TotalPrice') ?></th>
            <td><?= $this->Number->format($purchaseorder->totalPrice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($purchaseorder->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DeliveryStatus') ?></th>
            <td><?= $purchaseorder->deliveryStatus ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
