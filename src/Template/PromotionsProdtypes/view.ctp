<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Promotions Prodtype'), ['action' => 'edit', $promotionsProdtype->promotion_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Promotions Prodtype'), ['action' => 'delete', $promotionsProdtype->promotion_id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotionsProdtype->promotion_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Promotions Prodtypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotions Prodtype'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prodtypes'), ['controller' => 'Prodtypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prodtype'), ['controller' => 'Prodtypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="promotionsProdtypes view large-9 medium-8 columns content">
    <h3><?= h($promotionsProdtype->promotion_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Promotion') ?></th>
            <td><?= $promotionsProdtype->has('promotion') ? $this->Html->link($promotionsProdtype->promotion->id, ['controller' => 'Promotions', 'action' => 'view', $promotionsProdtype->promotion->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prodtype') ?></th>
            <td><?= $promotionsProdtype->has('prodtype') ? $this->Html->link($promotionsProdtype->prodtype->id, ['controller' => 'Prodtypes', 'action' => 'view', $promotionsProdtype->prodtype->id]) : '' ?></td>
        </tr>
    </table>
</div>
