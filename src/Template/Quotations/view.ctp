<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Quotation'), ['action' => 'edit', $quotation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Quotation'), ['action' => 'delete', $quotation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quotation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Quotations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quotation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="quotations view large-9 medium-8 columns content">
    <h3><?= h($quotation->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($quotation->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retailer Employee') ?></th>
            <td><?= $quotation->has('retailer_employee') ? $this->Html->link($quotation->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $quotation->retailer_employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier') ?></th>
            <td><?= $quotation->has('supplier') ? $this->Html->link($quotation->supplier->supplier_name, ['controller' => 'Suppliers', 'action' => 'view', $quotation->supplier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($quotation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($quotation->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($quotation->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Message') ?></h4>
        <?= $this->Text->autoParagraph(h($quotation->message)); ?>
    </div>
</div>
