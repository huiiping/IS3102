<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Retailer Loyalty Point'), ['action' => 'edit', $retailerLoyaltyPoint->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Retailer Loyalty Point'), ['action' => 'delete', $retailerLoyaltyPoint->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerLoyaltyPoint->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Loyalty Points'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Loyalty Point'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailers'), ['controller' => 'Retailers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer'), ['controller' => 'Retailers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="retailerLoyaltyPoints view large-9 medium-8 columns content">
    <h3><?= h($retailerLoyaltyPoint->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Retailer') ?></th>
            <td><?= $retailerLoyaltyPoint->has('retailer') ? $this->Html->link($retailerLoyaltyPoint->retailer->id, ['controller' => 'Retailers', 'action' => 'view', $retailerLoyaltyPoint->retailer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($retailerLoyaltyPoint->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Loyalty Pts') ?></th>
            <td><?= $this->Number->format($retailerLoyaltyPoint->loyalty_pts) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Redemption Pts') ?></th>
            <td><?= $this->Number->format($retailerLoyaltyPoint->redemption_pts) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($retailerLoyaltyPoint->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($retailerLoyaltyPoint->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Remarks') ?></h4>
        <?= $this->Text->autoParagraph(h($retailerLoyaltyPoint->remarks)); ?>
    </div>
</div>
