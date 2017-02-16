<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Promotion'), ['action' => 'edit', $promotion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Promotion'), ['action' => 'delete', $promotion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prodtypes'), ['controller' => 'Prodtypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prodtype'), ['controller' => 'Prodtypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="promotions view large-9 medium-8 columns content">
    <h3><?= h($promotion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('FirstVouherNo') ?></th>
            <td><?= h($promotion->firstVouherNo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LastVoucherNo') ?></th>
            <td><?= h($promotion->lastVoucherNo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CreditCardType') ?></th>
            <td><?= h($promotion->creditCardType) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retaileremployee') ?></th>
            <td><?= $promotion->has('retaileremployee') ? $this->Html->link($promotion->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $promotion->retaileremployee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($promotion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DiscountRate') ?></th>
            <td><?= $this->Number->format($promotion->discountRate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StartDate') ?></th>
            <td><?= h($promotion->startDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EndDate') ?></th>
            <td><?= h($promotion->endDate) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('PromoDesc') ?></h4>
        <?= $this->Text->autoParagraph(h($promotion->promoDesc)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Customers') ?></h4>
        <?php if (!empty($promotion->customers)): ?>
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
                <th scope="col"><?= __('AccountStatus') ?></th>
                <th scope="col"><?= __('MailingList') ?></th>
                <th scope="col"><?= __('CustMembershipTier Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($promotion->customers as $customers): ?>
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
                <td><?= h($customers->accountStatus) ?></td>
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
        <h4><?= __('Related Prodtypes') ?></h4>
        <?php if (!empty($promotion->prodtypes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('ProdName') ?></th>
                <th scope="col"><?= __('ProdDesc') ?></th>
                <th scope="col"><?= __('Colour') ?></th>
                <th scope="col"><?= __('Dimension') ?></th>
                <th scope="col"><?= __('StoreUnitPrice') ?></th>
                <th scope="col"><?= __('WebStoreUnitPrice') ?></th>
                <th scope="col"><?= __('SKU') ?></th>
                <th scope="col"><?= __('ProdCat Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($promotion->prodtypes as $prodtypes): ?>
            <tr>
                <td><?= h($prodtypes->id) ?></td>
                <td><?= h($prodtypes->prodName) ?></td>
                <td><?= h($prodtypes->prodDesc) ?></td>
                <td><?= h($prodtypes->colour) ?></td>
                <td><?= h($prodtypes->dimension) ?></td>
                <td><?= h($prodtypes->storeUnitPrice) ?></td>
                <td><?= h($prodtypes->webStoreUnitPrice) ?></td>
                <td><?= h($prodtypes->SKU) ?></td>
                <td><?= h($prodtypes->prodCat_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Prodtypes', 'action' => 'view', $prodtypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Prodtypes', 'action' => 'edit', $prodtypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Prodtypes', 'action' => 'delete', $prodtypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prodtypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
