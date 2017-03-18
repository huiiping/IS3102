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
        <li><?= $this->Html->link(__('List Rfqs'), ['controller' => 'Rfqs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rfq'), ['controller' => 'Rfqs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="quotations view large-9 medium-8 columns content">
    <h3><?= h($quotation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rfq') ?></th>
            <td><?= $quotation->has('rfq') ? $this->Html->link($quotation->rfq->title, ['controller' => 'Rfqs', 'action' => 'view', $quotation->rfq->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier') ?></th>
            <td><?= $quotation->has('supplier') ? $this->Html->link($quotation->supplier->supplier_name, ['controller' => 'Suppliers', 'action' => 'view', $quotation->supplier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FileName') ?></th>
            <td><?= h($quotation->fileName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FilePath') ?></th>
            <td><?= h($quotation->filePath) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comments') ?></th>
            <td><?= h($quotation->comments) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($quotation->status) ?></td>
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
</div>
