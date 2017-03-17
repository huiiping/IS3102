<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rfq Supplier'), ['action' => 'edit', $rfqSupplier->rfq_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rfq Supplier'), ['action' => 'delete', $rfqSupplier->rfq_id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfqSupplier->rfq_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rfq Suppliers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rfq Supplier'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rfqs'), ['controller' => 'Rfqs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rfq'), ['controller' => 'Rfqs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rfqSuppliers view large-9 medium-8 columns content">
    <h3><?= h($rfqSupplier->rfq_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rfq') ?></th>
            <td><?= $rfqSupplier->has('rfq') ? $this->Html->link($rfqSupplier->rfq->title, ['controller' => 'Rfqs', 'action' => 'view', $rfqSupplier->rfq->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier') ?></th>
            <td><?= $rfqSupplier->has('supplier') ? $this->Html->link($rfqSupplier->supplier->supplier_name, ['controller' => 'Suppliers', 'action' => 'view', $rfqSupplier->supplier->id]) : '' ?></td>
        </tr>
    </table>
</div>
