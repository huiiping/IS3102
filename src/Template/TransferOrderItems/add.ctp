<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Transfer Order Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Transfer Orders'), ['controller' => 'TransferOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transfer Order'), ['controller' => 'TransferOrders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transferOrderItems form large-9 medium-8 columns content">
    <?= $this->Form->create($transferOrderItem) ?>
    <fieldset>
        <legend><?= __('Add Transfer Order Item') ?></legend>
        <?php
            echo $this->Form->control('transfer_order_id', ['options' => $transferOrders]);
            echo $this->Form->control('item_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
