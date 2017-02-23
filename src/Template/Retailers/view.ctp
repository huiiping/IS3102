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
        <li><?= $this->Html->link(__('List Retailer Acc Types'), ['controller' => 'RetailerAccTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Acc Type'), ['controller' => 'RetailerAccTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="retailers view large-9 medium-8 columns content">
    <h3><?= h($retailer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Retailer Name') ?></th>
            <td><?= h($retailer->retailer_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account Status') ?></th>
            <td><?= h($retailer->account_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Term') ?></th>
            <td><?= h($retailer->payment_term) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retailer Email') ?></th>
            <td><?= h($retailer->retailer_email) ?></td>
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
            <th scope="row"><?= __('Retailer Acc Type') ?></th>
            <td><?= $retailer->has('retailer_acc_type') ? $this->Html->link($retailer->retailer_acc_type->name, ['controller' => 'RetailerAccTypes', 'action' => 'view', $retailer->retailer_acc_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($retailer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Of Users') ?></th>
            <td><?= $this->Number->format($retailer->num_of_users) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Of Warehouses') ?></th>
            <td><?= $this->Number->format($retailer->num_of_warehouses) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Of Stores') ?></th>
            <td><?= $this->Number->format($retailer->num_of_stores) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Of Product Types') ?></th>
            <td><?= $this->Number->format($retailer->num_of_product_types) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contract Start Date') ?></th>
            <td><?= h($retailer->contract_start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contract End Date') ?></th>
            <td><?= h($retailer->contract_end_date) ?></td>
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
        <h4><?= __('Retailer Desc') ?></h4>
        <?= $this->Text->autoParagraph(h($retailer->retailer_desc)); ?>
    </div>
</div>
