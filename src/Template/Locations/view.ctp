<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">




    <ul class="side-nav">

        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Location'), ['action' => 'edit', $location->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Location'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stocklevels'), ['controller' => 'Stocklevels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stocklevel'), ['controller' => 'Stocklevels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="locations view large-9 medium-8 columns content">
    <h3><?= h($location->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($location->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($location->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($location->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($location->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= $this->Number->format($location->contact) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Items') ?></h4>
        <?php if (!empty($location->items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('ItemName') ?></th>
                <th scope="col"><?= __('ItemDesc') ?></th>
                <th scope="col"><?= __('EPC') ?></th>
                <th scope="col"><?= __('Barcode') ?></th>
                <th scope="col"><?= __('ItemStatus') ?></th>
                <th scope="col"><?= __('Defective') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('ProdType Id') ?></th>
                <th scope="col"><?= __('Section Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->items as $items): ?>
            <tr>
                <td><?= h($items->id) ?></td>
                <td><?= h($items->itemName) ?></td>
                <td><?= h($items->itemDesc) ?></td>
                <td><?= h($items->EPC) ?></td>
                <td><?= h($items->barcode) ?></td>
                <td><?= h($items->itemStatus) ?></td>
                <td><?= h($items->defective) ?></td>
                <td><?= h($items->location_id) ?></td>
                <td><?= h($items->prodType_id) ?></td>
                <td><?= h($items->section_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Retaileremployees') ?></h4>
        <?php if (!empty($location->retaileremployees)): ?>
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
            <?php foreach ($location->retaileremployees as $retaileremployees): ?>
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
    <div class="related">
        <h4><?= __('Related Sections') ?></h4>
        <?php if (!empty($location->sections)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('SecName') ?></th>
                <th scope="col"><?= __('SpcaeLimit') ?></th>
                <th scope="col"><?= __('Reserve') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->sections as $sections): ?>
            <tr>
                <td><?= h($sections->id) ?></td>
                <td><?= h($sections->secName) ?></td>
                <td><?= h($sections->spcaeLimit) ?></td>
                <td><?= h($sections->reserve) ?></td>
                <td><?= h($sections->item_id) ?></td>
                <td><?= h($sections->location_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sections', 'action' => 'view', $sections->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sections', 'action' => 'edit', $sections->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sections', 'action' => 'delete', $sections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sections->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Stocklevels') ?></h4>
        <?php if (!empty($location->stocklevels)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('MinThresholdLevel') ?></th>
                <th scope="col"><?= __('Triggered') ?></th>
                <th scope="col"><?= __('NotificationMsg') ?></th>
                <th scope="col"><?= __('Receiver') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('ProdType Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->stocklevels as $stocklevels): ?>
            <tr>
                <td><?= h($stocklevels->id) ?></td>
                <td><?= h($stocklevels->minThresholdLevel) ?></td>
                <td><?= h($stocklevels->triggered) ?></td>
                <td><?= h($stocklevels->notificationMsg) ?></td>
                <td><?= h($stocklevels->receiver) ?></td>
                <td><?= h($stocklevels->location_id) ?></td>
                <td><?= h($stocklevels->prodType_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Stocklevels', 'action' => 'view', $stocklevels->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Stocklevels', 'action' => 'edit', $stocklevels->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Stocklevels', 'action' => 'delete', $stocklevels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stocklevels->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Transactions') ?></h4>
        <?php if (!empty($location->transactions)): ?>
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
            <?php foreach ($location->transactions as $transactions): ?>
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
        <h4><?= __('Related Promotions') ?></h4>
        <?php if (!empty($location->promotions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('StartDate') ?></th>
                <th scope="col"><?= __('EndDate') ?></th>
                <th scope="col"><?= __('PromoDesc') ?></th>
                <th scope="col"><?= __('Item1 Id') ?></th>
                <th scope="col"><?= __('Item2 Id') ?></th>
                <th scope="col"><?= __('ProdType1 Id') ?></th>
                <th scope="col"><?= __('ProdType2 Id') ?></th>
                <th scope="col"><?= __('FirstVouherNo') ?></th>
                <th scope="col"><?= __('LastVoucherNo') ?></th>
                <th scope="col"><?= __('DiscountRate') ?></th>
                <th scope="col"><?= __('CreditCardType') ?></th>
                <th scope="col"><?= __('ProdCat Id') ?></th>
                <th scope="col"><?= __('Employee Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->promotions as $promotions): ?>
            <tr>
                <td><?= h($promotions->id) ?></td>
                <td><?= h($promotions->startDate) ?></td>
                <td><?= h($promotions->endDate) ?></td>
                <td><?= h($promotions->promoDesc) ?></td>
                <td><?= h($promotions->item1_id) ?></td>
                <td><?= h($promotions->item2_id) ?></td>
                <td><?= h($promotions->prodType1_id) ?></td>
                <td><?= h($promotions->prodType2_id) ?></td>
                <td><?= h($promotions->firstVouherNo) ?></td>
                <td><?= h($promotions->lastVoucherNo) ?></td>
                <td><?= h($promotions->discountRate) ?></td>
                <td><?= h($promotions->creditCardType) ?></td>
                <td><?= h($promotions->prodCat_id) ?></td>
                <td><?= h($promotions->employee_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Promotions', 'action' => 'view', $promotions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Promotions', 'action' => 'edit', $promotions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Promotions', 'action' => 'delete', $promotions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
