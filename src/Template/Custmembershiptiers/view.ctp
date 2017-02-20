<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cust Membership Tier'), ['action' => 'edit', $custMembershipTier->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cust Membership Tier'), ['action' => 'delete', $custMembershipTier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $custMembershipTier->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cust Membership Tiers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cust Membership Tier'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="custMembershipTiers view large-9 medium-8 columns content">
    <h3><?= h($custMembershipTier->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tier Name') ?></th>
            <td><?= h($custMembershipTier->tier_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Min Spending') ?></th>
            <td><?= h($custMembershipTier->min_spending) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Membership Fee') ?></th>
            <td><?= h($custMembershipTier->membership_fee) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount Rate') ?></th>
            <td><?= h($custMembershipTier->discount_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birthday Rate') ?></th>
            <td><?= h($custMembershipTier->birthday_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($custMembershipTier->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Validity Period') ?></th>
            <td><?= $this->Number->format($custMembershipTier->validity_period) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Membership Pts') ?></th>
            <td><?= $this->Number->format($custMembershipTier->membership_pts) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Redemption Pts') ?></th>
            <td><?= $this->Number->format($custMembershipTier->redemption_pts) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($custMembershipTier->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($custMembershipTier->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($custMembershipTier->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Customers') ?></h4>
        <?php if (!empty($custMembershipTier->customers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Contact') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Account Status') ?></th>
                <th scope="col"><?= __('Mailing List') ?></th>
                <th scope="col"><?= __('Cust Membership Tier Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($custMembershipTier->customers as $customers): ?>
            <tr>
                <td><?= h($customers->id) ?></td>
                <td><?= h($customers->username) ?></td>
                <td><?= h($customers->password) ?></td>
                <td><?= h($customers->email) ?></td>
                <td><?= h($customers->address) ?></td>
                <td><?= h($customers->contact) ?></td>
                <td><?= h($customers->created) ?></td>
                <td><?= h($customers->modified) ?></td>
                <td><?= h($customers->first_name) ?></td>
                <td><?= h($customers->last_name) ?></td>
                <td><?= h($customers->account_status) ?></td>
                <td><?= h($customers->mailing_list) ?></td>
                <td><?= h($customers->cust_membership_tier_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Customers', 'action' => 'view', $customers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Customers', 'action' => 'edit', $customers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
