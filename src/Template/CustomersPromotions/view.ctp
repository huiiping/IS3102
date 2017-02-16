<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customers Promotion'), ['action' => 'edit', $customersPromotion->customer_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customers Promotion'), ['action' => 'delete', $customersPromotion->customer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $customersPromotion->customer_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers Promotions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customers Promotion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customersPromotions view large-9 medium-8 columns content">
    <h3><?= h($customersPromotion->customer_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $customersPromotion->has('customer') ? $this->Html->link($customersPromotion->customer->id, ['controller' => 'Customers', 'action' => 'view', $customersPromotion->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promotion') ?></th>
            <td><?= $customersPromotion->has('promotion') ? $this->Html->link($customersPromotion->promotion->id, ['controller' => 'Promotions', 'action' => 'view', $customersPromotion->promotion->id]) : '' ?></td>
        </tr>
    </table>
</div>
