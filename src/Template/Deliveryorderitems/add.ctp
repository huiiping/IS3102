<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Deliveryorderitems'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Deliveryorders'), ['controller' => 'Deliveryorders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deliveryorder'), ['controller' => 'Deliveryorders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deliveryorderitems form large-9 medium-8 columns content">
    <?= $this->Form->create($deliveryorderitem) ?>
    <fieldset>
        <legend><?= __('Add Deliveryorderitem') ?></legend>
        <?php
            echo $this->Form->input('item_id', ['options' => $items, 'empty' => true]);
            echo $this->Form->input('ECP');
            echo $this->Form->input('barcode');
            echo $this->Form->input('quantity');
            echo $this->Form->input('deliveryOrder_id', ['options' => $deliveryorders, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
