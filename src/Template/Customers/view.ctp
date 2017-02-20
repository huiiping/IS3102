<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cust Membership Tiers'), ['controller' => 'CustMembershipTiers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cust Membership Tier'), ['controller' => 'CustMembershipTiers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customers view large-9 medium-8 columns content">
    <h3><?= h($customer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($customer->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($customer->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($customer->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($customer->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= h($customer->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($customer->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($customer->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account Status') ?></th>
            <td><?= h($customer->account_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cust Membership Tier') ?></th>
            <td><?= $customer->has('cust_membership_tier') ? $this->Html->link($customer->cust_membership_tier->id, ['controller' => 'CustMembershipTiers', 'action' => 'view', $customer->cust_membership_tier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($customer->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($customer->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mailing List') ?></th>
            <td><?= $customer->mailing_list ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Promotions') ?></h4>
        <?php if (!empty($customer->promotions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Promo Desc') ?></th>
                <th scope="col"><?= __('First Vouher Num') ?></th>
                <th scope="col"><?= __('Last Voucher Num') ?></th>
                <th scope="col"><?= __('Discount Rate') ?></th>
                <th scope="col"><?= __('Credit Card Type') ?></th>
                <th scope="col"><?= __('Retailer Employee Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->promotions as $promotions): ?>
            <tr>
                <td><?= h($promotions->id) ?></td>
                <td><?= h($promotions->start_date) ?></td>
                <td><?= h($promotions->end_date) ?></td>
                <td><?= h($promotions->promo_desc) ?></td>
                <td><?= h($promotions->first_vouher_num) ?></td>
                <td><?= h($promotions->last_voucher_num) ?></td>
                <td><?= h($promotions->discount_rate) ?></td>
                <td><?= h($promotions->credit_card_type) ?></td>
                <td><?= h($promotions->retailer_employee_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Promotions', 'action' => 'view', $promotions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Promotions', 'action' => 'edit', $promotions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Promotions', 'action' => 'delete', $promotions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
