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
        <li><?= $this->Html->link(__('List Custmembershiptiers'), ['controller' => 'Custmembershiptiers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Custmembershiptier'), ['controller' => 'Custmembershiptiers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Membershippoints'), ['controller' => 'Membershippoints', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Membershippoint'), ['controller' => 'Membershippoints', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promotionemails'), ['controller' => 'Promotionemails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotionemail'), ['controller' => 'Promotionemails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?> </li>
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
            <th scope="row"><?= __('FirstName') ?></th>
            <td><?= h($customer->firstName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LastName') ?></th>
            <td><?= h($customer->lastName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Custmembershiptier') ?></th>
            <td><?= $customer->has('custmembershiptier') ? $this->Html->link($customer->custmembershiptier->id, ['controller' => 'Custmembershiptiers', 'action' => 'view', $customer->custmembershiptier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= $this->Number->format($customer->contact) ?></td>
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
            <th scope="row"><?= __('ActivationStatus') ?></th>
            <td><?= $customer->activationStatus ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MailingList') ?></th>
            <td><?= $customer->mailingList ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Membershippoints') ?></h4>
        <?php if (!empty($customer->membershippoints)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Points') ?></th>
                <th scope="col"><?= __('Addition') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->membershippoints as $membershippoints): ?>
            <tr>
                <td><?= h($membershippoints->id) ?></td>
                <td><?= h($membershippoints->points) ?></td>
                <td><?= h($membershippoints->addition) ?></td>
                <td><?= h($membershippoints->created) ?></td>
                <td><?= h($membershippoints->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Membershippoints', 'action' => 'view', $membershippoints->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Membershippoints', 'action' => 'edit', $membershippoints->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Membershippoints', 'action' => 'delete', $membershippoints->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membershippoints->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Transactions') ?></h4>
        <?php if (!empty($customer->transactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('TransactionStatus') ?></th>
                <th scope="col"><?= __('DateCreated') ?></th>
                <th scope="col"><?= __('TotalAmt') ?></th>
                <th scope="col"><?= __('Remarks') ?></th>
                <th scope="col"><?= __('ReferenceID') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->transactions as $transactions): ?>
            <tr>
                <td><?= h($transactions->id) ?></td>
                <td><?= h($transactions->transactionStatus) ?></td>
                <td><?= h($transactions->dateCreated) ?></td>
                <td><?= h($transactions->totalAmt) ?></td>
                <td><?= h($transactions->remarks) ?></td>
                <td><?= h($transactions->referenceID) ?></td>
                <td><?= h($transactions->location_id) ?></td>
                <td><?= h($transactions->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Transactions', 'action' => 'view', $transactions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Transactions', 'action' => 'edit', $transactions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactions', 'action' => 'delete', $transactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Promotionemails') ?></h4>
        <?php if (!empty($customer->promotionemails)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Employee Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->promotionemails as $promotionemails): ?>
            <tr>
                <td><?= h($promotionemails->id) ?></td>
                <td><?= h($promotionemails->employee_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Promotionemails', 'action' => 'view', $promotionemails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Promotionemails', 'action' => 'edit', $promotionemails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Promotionemails', 'action' => 'delete', $promotionemails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotionemails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Retaileremployees') ?></h4>
        <?php if (!empty($customer->retaileremployees)): ?>
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
                <th scope="col"><?= __('FirstName') ?></th>
                <th scope="col"><?= __('LastName') ?></th>
                <th scope="col"><?= __('ActivationStatus') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->retaileremployees as $retaileremployees): ?>
            <tr>
                <td><?= h($retaileremployees->id) ?></td>
                <td><?= h($retaileremployees->username) ?></td>
                <td><?= h($retaileremployees->password) ?></td>
                <td><?= h($retaileremployees->email) ?></td>
                <td><?= h($retaileremployees->address) ?></td>
                <td><?= h($retaileremployees->contact) ?></td>
                <td><?= h($retaileremployees->created) ?></td>
                <td><?= h($retaileremployees->modified) ?></td>
                <td><?= h($retaileremployees->firstName) ?></td>
                <td><?= h($retaileremployees->lastName) ?></td>
                <td><?= h($retaileremployees->activationStatus) ?></td>
                <td><?= h($retaileremployees->location_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Retaileremployees', 'action' => 'view', $retaileremployees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Retaileremployees', 'action' => 'edit', $retaileremployees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Retaileremployees', 'action' => 'delete', $retaileremployees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retaileremployees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
