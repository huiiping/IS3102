<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Accounttype'), ['action' => 'edit', $accounttype->accountId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Accounttype'), ['action' => 'delete', $accounttype->accountId], ['confirm' => __('Are you sure you want to delete # {0}?', $accounttype->accountId)]) ?> </li>
        <li><?= $this->Html->link(__('List Accounttype'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Accounttype'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="accounttype view large-9 medium-8 columns content">
    <h3><?= h($accounttype->accountId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('AccountTypeName') ?></th>
            <td><?= h($accounttype->accountTypeName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AccountId') ?></th>
            <td><?= $this->Number->format($accounttype->accountId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NumOfUsers') ?></th>
            <td><?= $this->Number->format($accounttype->numOfUsers) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NumOfWarehouses') ?></th>
            <td><?= $this->Number->format($accounttype->numOfWarehouses) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NumOfStores') ?></th>
            <td><?= $this->Number->format($accounttype->numOfStores) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NumOfProductTypes') ?></th>
            <td><?= $this->Number->format($accounttype->numOfProductTypes) ?></td>
        </tr>
    </table>
</div>
