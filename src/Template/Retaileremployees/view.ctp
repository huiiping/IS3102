<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Retaileremployee'), ['action' => 'edit', $retaileremployee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Retaileremployee'), ['action' => 'delete', $retaileremployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retaileremployee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Custmembershiptiers'), ['controller' => 'Custmembershiptiers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Custmembershiptier'), ['controller' => 'Custmembershiptiers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employeeroles'), ['controller' => 'Employeeroles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employeerole'), ['controller' => 'Employeeroles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliermemos'), ['controller' => 'Suppliermemos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Suppliermemo'), ['controller' => 'Suppliermemos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transferorders'), ['controller' => 'Transferorders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transferorder'), ['controller' => 'Transferorders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="retaileremployees view large-9 medium-8 columns content">
    <h3><?= h($retaileremployee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($retaileremployee->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($retaileremployee->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($retaileremployee->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($retaileremployee->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FirstName') ?></th>
            <td><?= h($retaileremployee->firstName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LastName') ?></th>
            <td><?= h($retaileremployee->lastName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $retaileremployee->has('location') ? $this->Html->link($retaileremployee->location->name, ['controller' => 'Locations', 'action' => 'view', $retaileremployee->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($retaileremployee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= $this->Number->format($retaileremployee->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($retaileremployee->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($retaileremployee->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ActivationStatus') ?></th>
            <td><?= $retaileremployee->activationStatus ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Custmembershiptiers') ?></h4>
        <?php if (!empty($retaileremployee->custmembershiptiers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('TeirName') ?></th>
                <th scope="col"><?= __('ValidityPeriod') ?></th>
                <th scope="col"><?= __('MinSpending') ?></th>
                <th scope="col"><?= __('MembershipFee') ?></th>
                <th scope="col"><?= __('MembershipPts') ?></th>
                <th scope="col"><?= __('RedemptionPts') ?></th>
                <th scope="col"><?= __('DiscountRate') ?></th>
                <th scope="col"><?= __('BirthdayRate') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($retaileremployee->custmembershiptiers as $custmembershiptiers): ?>
            <tr>
                <td><?= h($custmembershiptiers->id) ?></td>
                <td><?= h($custmembershiptiers->teirName) ?></td>
                <td><?= h($custmembershiptiers->validityPeriod) ?></td>
                <td><?= h($custmembershiptiers->minSpending) ?></td>
                <td><?= h($custmembershiptiers->membershipFee) ?></td>
                <td><?= h($custmembershiptiers->membershipPts) ?></td>
                <td><?= h($custmembershiptiers->redemptionPts) ?></td>
                <td><?= h($custmembershiptiers->discountRate) ?></td>
                <td><?= h($custmembershiptiers->birthdayRate) ?></td>
                <td><?= h($custmembershiptiers->description) ?></td>
                <td><?= h($custmembershiptiers->created) ?></td>
                <td><?= h($custmembershiptiers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Custmembershiptiers', 'action' => 'view', $custmembershiptiers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Custmembershiptiers', 'action' => 'edit', $custmembershiptiers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Custmembershiptiers', 'action' => 'delete', $custmembershiptiers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $custmembershiptiers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Customers') ?></h4>
        <?php if (!empty($retaileremployee->customers)): ?>
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
                <th scope="col"><?= __('MailingList') ?></th>
                <th scope="col"><?= __('CustMembershipTier Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($retaileremployee->customers as $customers): ?>
            <tr>
                <td><?= h($customers->id) ?></td>
                <td><?= h($customers->username) ?></td>
                <td><?= h($customers->password) ?></td>
                <td><?= h($customers->email) ?></td>
                <td><?= h($customers->address) ?></td>
                <td><?= h($customers->contact) ?></td>
                <td><?= h($customers->created) ?></td>
                <td><?= h($customers->modified) ?></td>
                <td><?= h($customers->firstName) ?></td>
                <td><?= h($customers->lastName) ?></td>
                <td><?= h($customers->activationStatus) ?></td>
                <td><?= h($customers->mailingList) ?></td>
                <td><?= h($customers->custMembershipTier_id) ?></td>
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
    <div class="related">
        <h4><?= __('Related Employeeroles') ?></h4>
        <?php if (!empty($retaileremployee->employeeroles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('RoleName') ?></th>
                <th scope="col"><?= __('RoleDesc') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($retaileremployee->employeeroles as $employeeroles): ?>
            <tr>
                <td><?= h($employeeroles->id) ?></td>
                <td><?= h($employeeroles->roleName) ?></td>
                <td><?= h($employeeroles->roleDesc) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Employeeroles', 'action' => 'view', $employeeroles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Employeeroles', 'action' => 'edit', $employeeroles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employeeroles', 'action' => 'delete', $employeeroles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeroles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Suppliermemos') ?></h4>
        <?php if (!empty($retaileremployee->suppliermemos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Remarks') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Supplier Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($retaileremployee->suppliermemos as $suppliermemos): ?>
            <tr>
                <td><?= h($suppliermemos->id) ?></td>
                <td><?= h($suppliermemos->remarks) ?></td>
                <td><?= h($suppliermemos->created) ?></td>
                <td><?= h($suppliermemos->supplier_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Suppliermemos', 'action' => 'view', $suppliermemos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Suppliermemos', 'action' => 'edit', $suppliermemos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Suppliermemos', 'action' => 'delete', $suppliermemos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suppliermemos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Transactions') ?></h4>
        <?php if (!empty($retaileremployee->transactions)): ?>
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
            <?php foreach ($retaileremployee->transactions as $transactions): ?>
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
        <h4><?= __('Related Transferorders') ?></h4>
        <?php if (!empty($retaileremployee->transferorders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('LocationFrom') ?></th>
                <th scope="col"><?= __('LocationTo') ?></th>
                <th scope="col"><?= __('TrasnferStatus') ?></th>
                <th scope="col"><?= __('TrasferDate') ?></th>
                <th scope="col"><?= __('Remarks') ?></th>
                <th scope="col"><?= __('LocationFrom Id') ?></th>
                <th scope="col"><?= __('LocationTo Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($retaileremployee->transferorders as $transferorders): ?>
            <tr>
                <td><?= h($transferorders->id) ?></td>
                <td><?= h($transferorders->locationFrom) ?></td>
                <td><?= h($transferorders->locationTo) ?></td>
                <td><?= h($transferorders->trasnferStatus) ?></td>
                <td><?= h($transferorders->trasferDate) ?></td>
                <td><?= h($transferorders->remarks) ?></td>
                <td><?= h($transferorders->locationFrom_id) ?></td>
                <td><?= h($transferorders->locationTo_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Transferorders', 'action' => 'view', $transferorders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Transferorders', 'action' => 'edit', $transferorders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transferorders', 'action' => 'delete', $transferorders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferorders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
