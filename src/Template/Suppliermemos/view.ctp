<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Supplier Memo'), ['action' => 'edit', $supplierMemo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Supplier Memo'), ['action' => 'delete', $supplierMemo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierMemo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Supplier Memos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier Memo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="supplierMemos view large-9 medium-8 columns content">
    <h3><?= h($supplierMemo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Remarks') ?></th>
            <td><?= h($supplierMemo->remarks) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier') ?></th>
            <td><?= $supplierMemo->has('supplier') ? $this->Html->link($supplierMemo->supplier->id, ['controller' => 'Suppliers', 'action' => 'view', $supplierMemo->supplier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retailer Employee') ?></th>
            <td><?= $supplierMemo->has('retailer_employee') ? $this->Html->link($supplierMemo->retailer_employee->id, ['controller' => 'RetailerEmployees', 'action' => 'view', $supplierMemo->retailer_employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($supplierMemo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($supplierMemo->created) ?></td>
        </tr>
    </table>
</div>
