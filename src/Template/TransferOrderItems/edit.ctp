<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transferOrderItem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transferOrderItem->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Transfer Order Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Transfer Orders'), ['controller' => 'TransferOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transfer Order'), ['controller' => 'TransferOrders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transferOrderItems form large-9 medium-8 columns content">
    <?= $this->Form->create($transferOrderItem) ?>
    <fieldset>
        <legend><?= __('Edit Transfer Order Item') ?></legend>
        <?php
            echo $this->Form->control('itemID');
            echo $this->Form->control('EPC');
            echo $this->Form->control('barcode');
            echo $this->Form->control('transfer_order_id', ['options' => $transferOrders, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
