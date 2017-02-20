<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Message'), ['action' => 'edit', $message->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Message'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="messages view large-9 medium-8 columns content">
    <h3><?= h($message->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($message->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference Id') ?></th>
            <td><?= h($message->reference_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($message->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sender Id') ?></th>
            <td><?= $this->Number->format($message->sender_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Created') ?></th>
            <td><?= h($message->date_created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $message->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Message') ?></h4>
        <?= $this->Text->autoParagraph(h($message->message)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Retailer Employees') ?></h4>
        <?php if (!empty($message->retailer_employees)): ?>
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
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Account Status') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($message->retailer_employees as $retailerEmployees): ?>
            <tr>
                <td><?= h($retailerEmployees->id) ?></td>
                <td><?= h($retailerEmployees->username) ?></td>
                <td><?= h($retailerEmployees->password) ?></td>
                <td><?= h($retailerEmployees->email) ?></td>
                <td><?= h($retailerEmployees->address) ?></td>
                <td><?= h($retailerEmployees->contact) ?></td>
                <td><?= h($retailerEmployees->created) ?></td>
                <td><?= h($retailerEmployees->modified) ?></td>
                <td><?= h($retailerEmployees->first_name) ?></td>
                <td><?= h($retailerEmployees->last_name) ?></td>
                <td><?= h($retailerEmployees->account_status) ?></td>
                <td><?= h($retailerEmployees->location_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RetailerEmployees', 'action' => 'view', $retailerEmployees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RetailerEmployees', 'action' => 'edit', $retailerEmployees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RetailerEmployees', 'action' => 'delete', $retailerEmployees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerEmployees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
