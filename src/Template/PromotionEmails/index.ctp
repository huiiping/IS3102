<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Promotion Email'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cust Membership Tiers'), ['controller' => 'CustMembershipTiers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cust Membership Tier'), ['controller' => 'CustMembershipTiers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="promotionEmails index large-9 medium-8 columns content">
    <h3><?= __('Promotion Emails') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('promotion_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cust_membership_tier_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('body') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_sent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number_of_sends') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($promotionEmails as $promotionEmail): ?>
            <tr>
                <td><?= $this->Number->format($promotionEmail->id) ?></td>
                <td><?= $promotionEmail->has('promotion') ? $this->Html->link($promotionEmail->promotion->id, ['controller' => 'Promotions', 'action' => 'view', $promotionEmail->promotion->id]) : '' ?></td>
                <td><?= $promotionEmail->has('cust_membership_tier') ? $this->Html->link($promotionEmail->cust_membership_tier->id, ['controller' => 'CustMembershipTiers', 'action' => 'view', $promotionEmail->cust_membership_tier->id]) : '' ?></td>
                <td><?= h($promotionEmail->title) ?></td>
                <td><?= h($promotionEmail->body) ?></td>
                <td><?= h($promotionEmail->last_sent) ?></td>
                <td><?= $this->Number->format($promotionEmail->number_of_sends) ?></td>
                <td><?= h($promotionEmail->created) ?></td>
                <td><?= h($promotionEmail->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $promotionEmail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $promotionEmail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $promotionEmail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotionEmail->id)]) ?>
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
