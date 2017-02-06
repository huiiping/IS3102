<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Account'), ['action' => 'edit', $account->userId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Account'), ['action' => 'delete', $account->userId], ['confirm' => __('Are you sure you want to delete # {0}?', $account->userId)]) ?> </li>
        <li><?= $this->Html->link(__('List Account'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="account view large-9 medium-8 columns content">
    <h3><?= h($account->userId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($account->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($account->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($account->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UserId') ?></th>
            <td><?= $this->Number->format($account->userId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DateJoined') ?></th>
            <td><?= h($account->dateJoined) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($account->address)); ?>
    </div>
    <div class="row">
        <h4><?= __('Phone') ?></h4>
        <?= $this->Text->autoParagraph(h($account->phone)); ?>
    </div>
</div>
