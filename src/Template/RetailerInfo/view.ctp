<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Retailer Info'), ['action' => 'edit', $retailerInfo->retailer_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Retailer Info'), ['action' => 'delete', $retailerInfo->retailer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerInfo->retailer_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Info'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Info'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailers'), ['controller' => 'Retailers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer'), ['controller' => 'Retailers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="retailerInfo view large-9 medium-8 columns content">
    <h3><?= h($retailerInfo->retailer_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Retailer') ?></th>
            <td><?= $retailerInfo->has('retailer') ? $this->Html->link($retailerInfo->retailer->id, ['controller' => 'Retailers', 'action' => 'view', $retailerInfo->retailer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retailer Name') ?></th>
            <td><?= h($retailerInfo->retailer_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retailer Email') ?></th>
            <td><?= h($retailerInfo->retailer_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($retailerInfo->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= h($retailerInfo->contact) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Retailer Desc') ?></h4>
        <?= $this->Text->autoParagraph(h($retailerInfo->retailer_desc)); ?>
    </div>
</div>
