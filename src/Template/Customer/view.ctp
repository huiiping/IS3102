<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->customerId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->customerId], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->customerId)]) ?> </li>
        <li><?= $this->Html->link(__('List Customer'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customer view large-9 medium-8 columns content">
    <h3><?= h($customer->customerId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('FirstName') ?></th>
            <td><?= h($customer->firstName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LastName') ?></th>
            <td><?= h($customer->lastName) ?></td>
        </tr>
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
            <th scope="row"><?= __('MembershipStatus') ?></th>
            <td><?= h($customer->membershipStatus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CustomerId') ?></th>
            <td><?= $this->Number->format($customer->customerId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= $this->Number->format($customer->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LoyaltyPoints') ?></th>
            <td><?= $this->Number->format($customer->loyaltyPoints) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DateJoined') ?></th>
            <td><?= h($customer->dateJoined) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ActivationStatus') ?></th>
            <td><?= $customer->activationStatus ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('ShippingAddress') ?></h4>
        <?= $this->Text->autoParagraph(h($customer->shippingAddress)); ?>
    </div>
</div>
