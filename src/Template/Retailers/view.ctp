<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <?= $this->Element('sideBar', array('type' => 'Retailer', 'typePlural' => 'retailers')); ?>
</nav>
<div class="retailers view large-9 medium-8 columns content">
    <h3><?= h($retailer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('CompanyName') ?></th>
            <td><?= h($retailer->companyName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FirstName') ?></th>
            <td><?= h($retailer->firstName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LastName') ?></th>
            <td><?= h($retailer->lastName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AccountStatus') ?></th>
            <td><?= h($retailer->accountStatus) ?></td>
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
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= h($retailer->contact) ?></td>
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
    </table>
    <div class="row">
        <h4><?= __('CompanyDesc') ?></h4>
        <?= $this->Text->autoParagraph(h($retailer->companyDesc)); ?>
    </div>
</div>
