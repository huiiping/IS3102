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
    </ul>
</nav>
<div class="custmembershiptiers view large-9 medium-8 columns content">
    <h3><?= h($custmembershiptier->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('TierName') ?></th>
            <td><?= h($custmembershiptier->tierName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MinSpending') ?></th>
            <td><?= h($custmembershiptier->minSpending) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MembershipFee') ?></th>
            <td><?= h($custmembershiptier->membershipFee) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DiscountRate') ?></th>
            <td><?= h($custmembershiptier->discountRate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BirthdayRate') ?></th>
            <td><?= h($custmembershiptier->birthdayRate) ?></td>
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
            <th scope="row"><?= __('MembershipPts') ?></th>
            <td><?= $this->Number->format($custmembershiptier->membershipPts) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RedemptionPts') ?></th>
            <td><?= $this->Number->format($custmembershiptier->redemptionPts) ?></td>
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
</div>
