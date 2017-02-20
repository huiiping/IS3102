<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prod Types'), ['controller' => 'ProdTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prod Type'), ['controller' => 'ProdTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="promotions index large-9 medium-8 columns content">
    <h3><?= __('Promotions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_vouher_num') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_voucher_num') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount_rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('credit_card_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($promotions as $promotion): ?>
            <tr>
                <td><?= $this->Number->format($promotion->id) ?></td>
                <td><?= h($promotion->start_date) ?></td>
                <td><?= h($promotion->end_date) ?></td>
                <td><?= h($promotion->first_vouher_num) ?></td>
                <td><?= h($promotion->last_voucher_num) ?></td>
                <td><?= $this->Number->format($promotion->discount_rate) ?></td>
                <td><?= h($promotion->credit_card_type) ?></td>
                <td><?= $promotion->has('retailer_employee') ? $this->Html->link($promotion->retailer_employee->id, ['controller' => 'RetailerEmployees', 'action' => 'view', $promotion->retailer_employee->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $promotion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $promotion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $promotion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotion->id)]) ?>
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
