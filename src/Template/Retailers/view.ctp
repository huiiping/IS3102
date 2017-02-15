<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Retailer'), ['action' => 'edit', $retailer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Retailer'), ['action' => 'delete', $retailer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Retailers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileracctypes'), ['controller' => 'Retaileracctypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileracctype'), ['controller' => 'Retaileracctypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="retailers view large-9 medium-8 columns content">
    <h3><?= h($retailer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('CompanyName') ?></th>
            <td><?= h($retailer->companyName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LastName') ?></th>
            <td><?= h($retailer->lastName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PaymentTerm') ?></th>
            <td><?= h($retailer->paymentTerm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($retailer->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($retailer->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($retailer->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($retailer->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retaileracctype') ?></th>
            <td><?= $retailer->has('retaileracctype') ? $this->Html->link($retailer->retaileracctype->name, ['controller' => 'Retaileracctypes', 'action' => 'view', $retailer->retaileracctype->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($retailer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LoyaltyPoints') ?></th>
            <td><?= $this->Number->format($retailer->loyaltyPoints) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= $this->Number->format($retailer->contact) ?></td>
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
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($retailer->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($retailer->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ActivationStatus') ?></th>
            <td><?= $retailer->activationStatus ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('CompanyDesc') ?></h4>
        <?= $this->Text->autoParagraph(h($retailer->companyDesc)); ?>
    </div>
</div>
