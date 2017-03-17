<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rfq'), ['action' => 'edit', $rfq->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rfq'), ['action' => 'delete', $rfq->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfq->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rfqs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rfq'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rfq Suppliers'), ['controller' => 'RfqSuppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rfq Supplier'), ['controller' => 'RfqSuppliers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rfqs view large-9 medium-8 columns content">
    <h3><?= h($rfq->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($rfq->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Body') ?></th>
            <td><?= h($rfq->body) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retailer Employee') ?></th>
            <td><?= $rfq->has('retailer_employee') ? $this->Html->link($rfq->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $rfq->retailer_employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($rfq->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Rfq Suppliers') ?></h4>
        <?php if (!empty($rfq->rfq_suppliers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Rfq Id') ?></th>
                <th scope="col"><?= __('Supplier Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rfq->rfq_suppliers as $rfqSuppliers): ?>
            <tr>
                <td><?= h($rfqSuppliers->rfq_id) ?></td>
                <td><?= h($rfqSuppliers->supplier_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RfqSuppliers', 'action' => 'view', $rfqSuppliers->rfq_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RfqSuppliers', 'action' => 'edit', $rfqSuppliers->rfq_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RfqSuppliers', 'action' => 'delete', $rfqSuppliers->rfq_id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfqSuppliers->rfq_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
