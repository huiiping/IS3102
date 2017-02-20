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
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prod Types'), ['controller' => 'ProdTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prod Type'), ['controller' => 'ProdTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="promotions view large-9 medium-8 columns content">
    <h3><?= h($promotion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Vouher Num') ?></th>
            <td><?= h($promotion->first_vouher_num) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Voucher Num') ?></th>
            <td><?= h($promotion->last_voucher_num) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Credit Card Type') ?></th>
            <td><?= h($promotion->credit_card_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retailer Employee') ?></th>
            <td><?= $promotion->has('retailer_employee') ? $this->Html->link($promotion->retailer_employee->id, ['controller' => 'RetailerEmployees', 'action' => 'view', $promotion->retailer_employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($promotion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount Rate') ?></th>
            <td><?= $this->Number->format($promotion->discount_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($promotion->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($promotion->end_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Promo Desc') ?></h4>
        <?= $this->Text->autoParagraph(h($promotion->promo_desc)); ?>
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
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Account Status') ?></th>
                <th scope="col"><?= __('Mailing List') ?></th>
                <th scope="col"><?= __('Cust Membership Tier Id') ?></th>
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
                <td><?= h($customers->first_name) ?></td>
                <td><?= h($customers->last_name) ?></td>
                <td><?= h($customers->account_status) ?></td>
                <td><?= h($customers->mailing_list) ?></td>
                <td><?= h($customers->cust_membership_tier_id) ?></td>
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
        <h4><?= __('Related Prod Types') ?></h4>
        <?php if (!empty($promotion->prod_types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Prod Name') ?></th>
                <th scope="col"><?= __('Prod Desc') ?></th>
                <th scope="col"><?= __('Colour') ?></th>
                <th scope="col"><?= __('Dimension') ?></th>
                <th scope="col"><?= __('Store Unit Price') ?></th>
                <th scope="col"><?= __('Web Store Unit Price') ?></th>
                <th scope="col"><?= __('SKU') ?></th>
                <th scope="col"><?= __('Prod Cat Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($promotion->prod_types as $prodTypes): ?>
            <tr>
                <td><?= h($prodTypes->id) ?></td>
                <td><?= h($prodTypes->prod_name) ?></td>
                <td><?= h($prodTypes->prod_desc) ?></td>
                <td><?= h($prodTypes->colour) ?></td>
                <td><?= h($prodTypes->dimension) ?></td>
                <td><?= h($prodTypes->store_unit_price) ?></td>
                <td><?= h($prodTypes->web_store_unit_price) ?></td>
                <td><?= h($prodTypes->SKU) ?></td>
                <td><?= h($prodTypes->prod_cat_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProdTypes', 'action' => 'view', $prodTypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProdTypes', 'action' => 'edit', $prodTypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProdTypes', 'action' => 'delete', $prodTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prodTypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
