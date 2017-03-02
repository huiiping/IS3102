<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Promotion Email'), ['action' => 'edit', $promotionEmail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Promotion Email'), ['action' => 'delete', $promotionEmail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotionEmail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Promotion Emails'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion Email'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cust Membership Tiers'), ['controller' => 'CustMembershipTiers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cust Membership Tier'), ['controller' => 'CustMembershipTiers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="promotionEmails view large-9 medium-8 columns content">
    <h3><?= h($promotionEmail->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Promotion') ?></th>
            <td><?= $promotionEmail->has('promotion') ? $this->Html->link($promotionEmail->promotion->id, ['controller' => 'Promotions', 'action' => 'view', $promotionEmail->promotion->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cust Membership Tier') ?></th>
            <td><?= $promotionEmail->has('cust_membership_tier') ? $this->Html->link($promotionEmail->cust_membership_tier->id, ['controller' => 'CustMembershipTiers', 'action' => 'view', $promotionEmail->cust_membership_tier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($promotionEmail->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Body') ?></th>
            <td><?= h($promotionEmail->body) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($promotionEmail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Of Sends') ?></th>
            <td><?= $this->Number->format($promotionEmail->number_of_sends) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Sent') ?></th>
            <td><?= h($promotionEmail->last_sent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($promotionEmail->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($promotionEmail->modified) ?></td>
        </tr>
    </table>
</div>
