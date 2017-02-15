<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Custmembershiptier'), ['action' => 'edit', $custmembershiptier->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Custmembershiptier'), ['action' => 'delete', $custmembershiptier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $custmembershiptier->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Custmembershiptiers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Custmembershiptier'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="custmembershiptiers view large-9 medium-8 columns content">
    <h3><?= h($custmembershiptier->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('TeirName') ?></th>
            <td><?= h($custmembershiptier->teirName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($custmembershiptier->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ValidityPeriod') ?></th>
            <td><?= $this->Number->format($custmembershiptier->validityPeriod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MinSpending') ?></th>
            <td><?= $this->Number->format($custmembershiptier->minSpending) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MembershipFee') ?></th>
            <td><?= $this->Number->format($custmembershiptier->membershipFee) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MembershipPts') ?></th>
            <td><?= $this->Number->format($custmembershiptier->membershipPts) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RedemptionPts') ?></th>
            <td><?= $this->Number->format($custmembershiptier->redemptionPts) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DiscountRate') ?></th>
            <td><?= $this->Number->format($custmembershiptier->discountRate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BirthdayRate') ?></th>
            <td><?= $this->Number->format($custmembershiptier->birthdayRate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($custmembershiptier->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($custmembershiptier->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($custmembershiptier->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Retaileremployees') ?></h4>
        <?php if (!empty($custmembershiptier->retaileremployees)): ?>
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
            <?php foreach ($custmembershiptier->retaileremployees as $retaileremployees): ?>
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
