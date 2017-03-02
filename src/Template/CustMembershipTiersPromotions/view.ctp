<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cust Membership Tiers Promotion'), ['action' => 'edit', $custMembershipTiersPromotion->cust_membership_tier_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cust Membership Tiers Promotion'), ['action' => 'delete', $custMembershipTiersPromotion->cust_membership_tier_id], ['confirm' => __('Are you sure you want to delete # {0}?', $custMembershipTiersPromotion->cust_membership_tier_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cust Membership Tiers Promotions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cust Membership Tiers Promotion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cust Membership Tiers'), ['controller' => 'CustMembershipTiers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cust Membership Tier'), ['controller' => 'CustMembershipTiers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="custMembershipTiersPromotions view large-9 medium-8 columns content">
    <h3><?= h($custMembershipTiersPromotion->cust_membership_tier_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cust Membership Tier') ?></th>
            <td><?= $custMembershipTiersPromotion->has('cust_membership_tier') ? $this->Html->link($custMembershipTiersPromotion->cust_membership_tier->id, ['controller' => 'CustMembershipTiers', 'action' => 'view', $custMembershipTiersPromotion->cust_membership_tier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promotion') ?></th>
            <td><?= $custMembershipTiersPromotion->has('promotion') ? $this->Html->link($custMembershipTiersPromotion->promotion->id, ['controller' => 'Promotions', 'action' => 'view', $custMembershipTiersPromotion->promotion->id]) : '' ?></td>
        </tr>
    </table>
</div>
