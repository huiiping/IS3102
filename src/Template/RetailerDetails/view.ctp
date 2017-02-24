<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Retailer Detail'), ['action' => 'edit', $retailerDetail->retailerid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Retailer Detail'), ['action' => 'delete', $retailerDetail->retailerid], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerDetail->retailerid)]) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Detail'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="retailerDetails view large-9 medium-8 columns content">
    <h3><?= h($retailerDetail->retailerid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Retailer Name') ?></th>
            <td><?= h($retailerDetail->retailer_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retailer Email') ?></th>
            <td><?= h($retailerDetail->retailer_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($retailerDetail->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= h($retailerDetail->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retailerid') ?></th>
            <td><?= $this->Number->format($retailerDetail->retailerid) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Retailer Desc') ?></h4>
        <?= $this->Text->autoParagraph(h($retailerDetail->retailer_desc)); ?>
    </div>
</div>
