<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cust Membership Tier'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="custMembershipTiers index large-9 medium-8 columns content">
    <h3><?= __('Customer Membership Tiers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tier_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('validity_period') ?></th>
                <th scope="col"><?= $this->Paginator->sort('min_spending') ?></th>
                <th scope="col"><?= $this->Paginator->sort('membership_fee') ?></th>
                <th scope="col"><?= $this->Paginator->sort('membership_pts') ?></th>
                <th scope="col"><?= $this->Paginator->sort('redemption_pts') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount_rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('birthday_rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($custMembershipTiers as $custMembershipTier): ?>
            <tr>
                <td><?= $this->Number->format($custMembershipTier->id) ?></td>
                <td><?= h($custMembershipTier->tier_name) ?></td>
                <td><?= $this->Number->format($custMembershipTier->validity_period) ?></td>
                <td><?= h($custMembershipTier->min_spending) ?></td>
                <td><?= h($custMembershipTier->membership_fee) ?></td>
                <td><?= $this->Number->format($custMembershipTier->membership_pts) ?></td>
                <td><?= $this->Number->format($custMembershipTier->redemption_pts) ?></td>
                <td><?= h($custMembershipTier->discount_rate) ?></td>
                <td><?= h($custMembershipTier->birthday_rate) ?></td>
                <td><?= h($custMembershipTier->created) ?></td>
                <td><?= h($custMembershipTier->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $custMembershipTier->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $custMembershipTier->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $custMembershipTier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $custMembershipTier->id)]) ?>
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
