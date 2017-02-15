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
</div>
