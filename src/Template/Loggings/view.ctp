<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Logging'), ['action' => 'edit', $logging->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Logging'), ['action' => 'delete', $logging->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logging->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Loggings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Logging'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="loggings view large-9 medium-8 columns content">
    <h3><?= h($logging->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($logging->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($logging->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entity Num') ?></th>
            <td><?= $this->Number->format($logging->entity_num) ?></td>
        </tr>
    </table>
</div>
