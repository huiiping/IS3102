<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Custmembershiptiers Retaileremployee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Custmembershiptiers'), ['controller' => 'Custmembershiptiers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Custmembershiptier'), ['controller' => 'Custmembershiptiers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="custmembershiptiersRetaileremployees index large-9 medium-8 columns content">
    <h3><?= __('Custmembershiptiers Retaileremployees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('custMembershipTier_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailerEmployee_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($custmembershiptiersRetaileremployees as $custmembershiptiersRetaileremployee): ?>
            <tr>
                <td><?= $custmembershiptiersRetaileremployee->has('custmembershiptier') ? $this->Html->link($custmembershiptiersRetaileremployee->custmembershiptier->id, ['controller' => 'Custmembershiptiers', 'action' => 'view', $custmembershiptiersRetaileremployee->custmembershiptier->id]) : '' ?></td>
                <td><?= $custmembershiptiersRetaileremployee->has('retaileremployee') ? $this->Html->link($custmembershiptiersRetaileremployee->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $custmembershiptiersRetaileremployee->retaileremployee->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $custmembershiptiersRetaileremployee->custMembershipTier_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $custmembershiptiersRetaileremployee->custMembershipTier_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $custmembershiptiersRetaileremployee->custMembershipTier_id], ['confirm' => __('Are you sure you want to delete # {0}?', $custmembershiptiersRetaileremployee->custMembershipTier_id)]) ?>
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
