<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Retaileracctype'), ['action' => 'edit', $retaileracctype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Retaileracctype'), ['action' => 'delete', $retaileracctype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retaileracctype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Retaileracctypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileracctype'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailers'), ['controller' => 'Retailers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer'), ['controller' => 'Retailers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="retaileracctypes view large-9 medium-8 columns content">
    <h3><?= h($retaileracctype->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($retaileracctype->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($retaileracctype->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NumOfUsers') ?></th>
            <td><?= $this->Number->format($retaileracctype->numOfUsers) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NumOfWarehouses') ?></th>
            <td><?= $this->Number->format($retaileracctype->numOfWarehouses) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NumOfStores') ?></th>
            <td><?= $this->Number->format($retaileracctype->numOfStores) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NumOfProdTypes') ?></th>
            <td><?= $this->Number->format($retaileracctype->numOfProdTypes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($retaileracctype->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($retaileracctype->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Retailers') ?></h4>
        <?php if (!empty($retaileracctype->retailers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Company Name') ?></th>
                <th scope="col"><?= __('Company Desc') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Activation Status') ?></th>
                <th scope="col"><?= __('Payment Term') ?></th>
                <th scope="col"><?= __('Loyalty Points') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Contact') ?></th>
                <th scope="col"><?= __('ContractStartDate') ?></th>
                <th scope="col"><?= __('ContractEndDate') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Retaileracctype Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($retaileracctype->retailers as $retailers): ?>
            <tr>
                <td><?= h($retailers->id) ?></td>
                <td><?= h($retailers->company_name) ?></td>
                <td><?= h($retailers->company_desc) ?></td>
                <td><?= h($retailers->last_name) ?></td>
                <td><?= h($retailers->activation_status) ?></td>
                <td><?= h($retailers->payment_term) ?></td>
                <td><?= h($retailers->loyalty_points) ?></td>
                <td><?= h($retailers->username) ?></td>
                <td><?= h($retailers->email) ?></td>
                <td><?= h($retailers->password) ?></td>
                <td><?= h($retailers->address) ?></td>
                <td><?= h($retailers->contact) ?></td>
                <td><?= h($retailers->contractStartDate) ?></td>
                <td><?= h($retailers->contractEndDate) ?></td>
                <td><?= h($retailers->created) ?></td>
                <td><?= h($retailers->modified) ?></td>
                <td><?= h($retailers->retaileracctype_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Retailers', 'action' => 'view', $retailers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Retailers', 'action' => 'edit', $retailers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Retailers', 'action' => 'delete', $retailers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
