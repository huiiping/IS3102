<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Custmembershiptiers Retaileremployee'), ['action' => 'edit', $custmembershiptiersRetaileremployee->custMembershipTier_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Custmembershiptiers Retaileremployee'), ['action' => 'delete', $custmembershiptiersRetaileremployee->custMembershipTier_id], ['confirm' => __('Are you sure you want to delete # {0}?', $custmembershiptiersRetaileremployee->custMembershipTier_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Custmembershiptiers Retaileremployees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Custmembershiptiers Retaileremployee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Custmembershiptiers'), ['controller' => 'Custmembershiptiers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Custmembershiptier'), ['controller' => 'Custmembershiptiers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="custmembershiptiersRetaileremployees view large-9 medium-8 columns content">
    <h3><?= h($custmembershiptiersRetaileremployee->custMembershipTier_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Custmembershiptier') ?></th>
            <td><?= $custmembershiptiersRetaileremployee->has('custmembershiptier') ? $this->Html->link($custmembershiptiersRetaileremployee->custmembershiptier->id, ['controller' => 'Custmembershiptiers', 'action' => 'view', $custmembershiptiersRetaileremployee->custmembershiptier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retaileremployee') ?></th>
            <td><?= $custmembershiptiersRetaileremployee->has('retaileremployee') ? $this->Html->link($custmembershiptiersRetaileremployee->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $custmembershiptiersRetaileremployee->retaileremployee->id]) : '' ?></td>
        </tr>
    </table>
</div>
