<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Location'), ['action' => 'edit', $location->locationId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Location'), ['action' => 'delete', $location->locationId], ['confirm' => __('Are you sure you want to delete # {0}?', $location->locationId)]) ?> </li>
        <li><?= $this->Html->link(__('List Location'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="location view large-9 medium-8 columns content">
    <h3><?= h($location->locationId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('LocationName') ?></th>
            <td><?= h($location->locationName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= h($location->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($location->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LocationId') ?></th>
            <td><?= $this->Number->format($location->locationId) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($location->address)); ?>
    </div>
</div>
