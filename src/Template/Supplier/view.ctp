<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Supplier'), ['action' => 'edit', $supplier->supplierId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Supplier'), ['action' => 'delete', $supplier->supplierId], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->supplierId)]) ?> </li>
        <li><?= $this->Html->link(__('List Supplier'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="supplier view large-9 medium-8 columns content">
    <h3><?= h($supplier->supplierId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('SupplierName') ?></th>
            <td><?= h($supplier->supplierName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SupplierId') ?></th>
            <td><?= $this->Number->format($supplier->supplierId) ?></td>
        </tr>
    </table>
</div>
