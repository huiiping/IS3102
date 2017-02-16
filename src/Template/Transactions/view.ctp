<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transaction'), ['action' => 'edit', $transaction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transaction'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Deliveryorders'), ['controller' => 'Deliveryorders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deliveryorder'), ['controller' => 'Deliveryorders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactionitems'), ['controller' => 'Transactionitems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transactionitem'), ['controller' => 'Transactionitems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transactions view large-9 medium-8 columns content">
    <h3><?= h($transaction->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('TransactionStatus') ?></th>
            <td><?= h($transaction->transactionStatus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $transaction->has('location') ? $this->Html->link($transaction->location->name, ['controller' => 'Locations', 'action' => 'view', $transaction->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $transaction->has('customer') ? $this->Html->link($transaction->customer->id, ['controller' => 'Customers', 'action' => 'view', $transaction->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($transaction->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TotalAmt') ?></th>
            <td><?= $this->Number->format($transaction->totalAmt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ReferenceID') ?></th>
            <td><?= $this->Number->format($transaction->referenceID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DateCreated') ?></th>
            <td><?= h($transaction->dateCreated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Remarks') ?></h4>
        <?= $this->Text->autoParagraph(h($transaction->remarks)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Deliveryorders') ?></h4>
        <?php if (!empty($transaction->deliveryorders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('DeliveryStatus') ?></th>
                <th scope="col"><?= __('DeliveryCharge') ?></th>
                <th scope="col"><?= __('ExpectedDeliveryDate') ?></th>
                <th scope="col"><?= __('ActualDeliveryDate') ?></th>
                <th scope="col"><?= __('Deliverer') ?></th>
                <th scope="col"><?= __('Transaction Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($transaction->deliveryorders as $deliveryorders): ?>
            <tr>
                <td><?= h($deliveryorders->id) ?></td>
                <td><?= h($deliveryorders->deliveryStatus) ?></td>
                <td><?= h($deliveryorders->deliveryCharge) ?></td>
                <td><?= h($deliveryorders->expectedDeliveryDate) ?></td>
                <td><?= h($deliveryorders->actualDeliveryDate) ?></td>
                <td><?= h($deliveryorders->deliverer) ?></td>
                <td><?= h($deliveryorders->transaction_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Deliveryorders', 'action' => 'view', $deliveryorders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Deliveryorders', 'action' => 'edit', $deliveryorders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Deliveryorders', 'action' => 'delete', $deliveryorders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryorders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Transactionitems') ?></h4>
        <?php if (!empty($transaction->transactionitems)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('TransactionStatus') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('ItemDesc') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('UnitPrice') ?></th>
                <th scope="col"><?= __('Transaction Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($transaction->transactionitems as $transactionitems): ?>
            <tr>
                <td><?= h($transactionitems->id) ?></td>
                <td><?= h($transactionitems->transactionStatus) ?></td>
                <td><?= h($transactionitems->item_id) ?></td>
                <td><?= h($transactionitems->itemDesc) ?></td>
                <td><?= h($transactionitems->quantity) ?></td>
                <td><?= h($transactionitems->unitPrice) ?></td>
                <td><?= h($transactionitems->transaction_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Transactionitems', 'action' => 'view', $transactionitems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Transactionitems', 'action' => 'edit', $transactionitems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactionitems', 'action' => 'delete', $transactionitems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactionitems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Retaileremployees') ?></h4>
        <?php if (!empty($transaction->retaileremployees)): ?>
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
            <?php foreach ($transaction->retaileremployees as $retaileremployees): ?>
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
