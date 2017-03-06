<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cust Membership Tiers Promotion'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cust Membership Tiers'), ['controller' => 'CustMembershipTiers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cust Membership Tier'), ['controller' => 'CustMembershipTiers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="custMembershipTiersPromotions index large-9 medium-8 columns content">

    <br>
    <!--<legend><h4><?= __('Search') ?></h4></legend>-->
    <table cellpadding="0" cellspacing="0", bgcolor="#FFFFFF">
        <tr><?php
            echo $this->Form->create($custMembershipTiersPromotions);?>
            <th width="10"></th>
            <th scope="col"><?= $this->Form->input(('membershipTier_id'), ['label' => 'Membership Tier Id', 'type' => 'search']); ?></th>
            <th width="10"></th>
            <th scope="col"><?= $this->Form->input('membershiptier_name',['label' => 'Membership Tier Name', 'type' => 'search']); ?></th>
            <th width="30"></th>
            <th scope="col"><?= $this->Form->input('credit_card_type',['label' => 'Credit Card Type', 'type' => 'search']); ?></th>
            <th width="30"></th>
            <th scope="col"><?= $this->Form->input('promotion_id',['label' => 'Promotion Id', 'type' => 'search']); ?></th>
            <th width="30"></th>
            <th scope="col" class="actions"><?= $this->Form->submit(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?></th>
            <th width="10"></th>
            <?php echo $this->Form->end();?>
        </tr>
    </table>
    <br>

    <h3><?= __('Cust Membership Tiers Promotions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('cust_membership_tier_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('promotion_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($custMembershipTiersPromotions as $custMembershipTiersPromotion): ?>
            <tr>
                <td><?= $custMembershipTiersPromotion->has('cust_membership_tier') ? $this->Html->link($custMembershipTiersPromotion->cust_membership_tier->id, ['controller' => 'CustMembershipTiers', 'action' => 'view', $custMembershipTiersPromotion->cust_membership_tier->id]) : '' ?></td>
                <td><?= $custMembershipTiersPromotion->has('promotion') ? $this->Html->link($custMembershipTiersPromotion->promotion->id, ['controller' => 'Promotions', 'action' => 'view', $custMembershipTiersPromotion->promotion->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $custMembershipTiersPromotion->cust_membership_tier_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $custMembershipTiersPromotion->cust_membership_tier_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $custMembershipTiersPromotion->cust_membership_tier_id], ['confirm' => __('Are you sure you want to delete # {0}?', $custMembershipTiersPromotion->cust_membership_tier_id)]) ?>
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
