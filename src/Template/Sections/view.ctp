<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Section'), ['action' => 'edit', $section->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Section'), ['action' => 'delete', $section->id], ['confirm' => __('Are you sure you want to delete # {0}?', $section->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Section'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sections view large-9 medium-8 columns content">
    <h3><?= h($section->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sec Name') ?></th>
            <td><?= h($section->sec_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $section->has('location') ? $this->Html->link($section->location->name, ['controller' => 'Locations', 'action' => 'view', $section->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($section->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Space Limit') ?></th>
            <td><?= $this->Number->format($section->space_limit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reserve') ?></th>
            <td><?= $section->reserve ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
