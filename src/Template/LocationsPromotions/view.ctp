<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Locations Promotion'), ['action' => 'edit', $locationsPromotion->location_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Locations Promotion'), ['action' => 'delete', $locationsPromotion->location_id], ['confirm' => __('Are you sure you want to delete # {0}?', $locationsPromotion->location_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Locations Promotions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Locations Promotion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="locationsPromotions view large-9 medium-8 columns content">
    <h3><?= h($locationsPromotion->location_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $locationsPromotion->has('location') ? $this->Html->link($locationsPromotion->location->name, ['controller' => 'Locations', 'action' => 'view', $locationsPromotion->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promotion') ?></th>
            <td><?= $locationsPromotion->has('promotion') ? $this->Html->link($locationsPromotion->promotion->id, ['controller' => 'Promotions', 'action' => 'view', $locationsPromotion->promotion->id]) : '' ?></td>
        </tr>
    </table>
</div>
