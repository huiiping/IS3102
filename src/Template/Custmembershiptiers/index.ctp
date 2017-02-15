<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Custmembershiptier'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="custmembershiptiers index large-9 medium-8 columns content">
    <h3><?= __('Custmembershiptiers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('teirName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('validityPeriod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('minSpending') ?></th>
                <th scope="col"><?= $this->Paginator->sort('membershipFee') ?></th>
                <th scope="col"><?= $this->Paginator->sort('membershipPts') ?></th>
                <th scope="col"><?= $this->Paginator->sort('redemptionPts') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discountRate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('birthdayRate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($custmembershiptiers as $custmembershiptier): ?>
            <tr>
                <td><?= $this->Number->format($custmembershiptier->id) ?></td>
                <td><?= h($custmembershiptier->teirName) ?></td>
                <td><?= $this->Number->format($custmembershiptier->validityPeriod) ?></td>
                <td><?= $this->Number->format($custmembershiptier->minSpending) ?></td>
                <td><?= $this->Number->format($custmembershiptier->membershipFee) ?></td>
                <td><?= $this->Number->format($custmembershiptier->membershipPts) ?></td>
                <td><?= $this->Number->format($custmembershiptier->redemptionPts) ?></td>
                <td><?= $this->Number->format($custmembershiptier->discountRate) ?></td>
                <td><?= $this->Number->format($custmembershiptier->birthdayRate) ?></td>
                <td><?= h($custmembershiptier->created) ?></td>
                <td><?= h($custmembershiptier->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $custmembershiptier->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $custmembershiptier->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $custmembershiptier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $custmembershiptier->id)]) ?>
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
