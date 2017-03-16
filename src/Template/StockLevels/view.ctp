<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stock Level'), ['action' => 'edit', $stockLevel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stock Level'), ['action' => 'delete', $stockLevel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stockLevel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stock Levels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock Level'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stockLevels view large-9 medium-8 columns content">
    <h3><?= h($stockLevel->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $stockLevel->has('location') ? $this->Html->link($stockLevel->location->name, ['controller' => 'Locations', 'action' => 'view', $stockLevel->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $stockLevel->has('product') ? $this->Html->link($stockLevel->product->id, ['controller' => 'Products', 'action' => 'view', $stockLevel->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($stockLevel->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retailer Employee') ?></th>
            <td><?= $stockLevel->has('retailer_employee') ? $this->Html->link($stockLevel->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $stockLevel->retailer_employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($stockLevel->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Threshold') ?></th>
            <td><?= $this->Number->format($stockLevel->threshold) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($stockLevel->created) ?></td>
        </tr>
    </table>
</div>
