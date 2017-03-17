<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rfq'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rfq Suppliers'), ['controller' => 'RfqSuppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rfq Supplier'), ['controller' => 'RfqSuppliers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rfqs index large-9 medium-8 columns content">
    <h3><?= __('Rfqs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('body') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rfqs as $rfq): ?>
            <tr>
                <td><?= $this->Number->format($rfq->id) ?></td>
                <td><?= h($rfq->title) ?></td>
                <td><?= h($rfq->body) ?></td>
                <td><?= $rfq->has('retailer_employee') ? $this->Html->link($rfq->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $rfq->retailer_employee->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rfq->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rfq->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rfq->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfq->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
