<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rfqs Supplier'), ['action' => 'edit', $rfqsSupplier->rfq_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rfqs Supplier'), ['action' => 'delete', $rfqsSupplier->rfq_id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfqsSupplier->rfq_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rfqs Suppliers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rfqs Supplier'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rfqs'), ['controller' => 'Rfqs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rfq'), ['controller' => 'Rfqs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rfqsSuppliers view large-9 medium-8 columns content">
    <h3><?= h($rfqsSupplier->rfq_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rfq') ?></th>
            <td><?= $rfqsSupplier->has('rfq') ? $this->Html->link($rfqsSupplier->rfq->title, ['controller' => 'Rfqs', 'action' => 'view', $rfqsSupplier->rfq->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier') ?></th>
            <td><?= $rfqsSupplier->has('supplier') ? $this->Html->link($rfqsSupplier->supplier->supplier_name, ['controller' => 'Suppliers', 'action' => 'view', $rfqsSupplier->supplier->id]) : '' ?></td>
        </tr>
    </table>
</div>
