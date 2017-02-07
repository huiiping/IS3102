<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Retailer'), ['action' => 'edit', $retailer->retailerId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Retailer'), ['action' => 'delete', $retailer->retailerId], ['confirm' => __('Are you sure you want to delete # {0}?', $retailer->retailerId)]) ?> </li>
        <li><?= $this->Html->link(__('List Retailer'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="retailer view large-9 medium-8 columns content">
    <h3><?= h($retailer->retailerId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('RetailerName') ?></th>
            <td><?= h($retailer->retailerName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($retailer->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AccountType') ?></th>
            <td><?= h($retailer->accountType) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PaymentType') ?></th>
            <td><?= h($retailer->paymentType) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RetailerId') ?></th>
            <td><?= $this->Number->format($retailer->retailerId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LoyaltyPoints') ?></th>
            <td><?= $this->Number->format($retailer->loyaltyPoints) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ContractStartDate') ?></th>
            <td><?= h($retailer->contractStartDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ContractEndDate') ?></th>
            <td><?= h($retailer->contractEndDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ActivationStatus') ?></th>
            <td><?= $retailer->activationStatus ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
