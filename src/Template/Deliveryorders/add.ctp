<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Deliveryorders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deliveryorders form large-9 medium-8 columns content">
    <?= $this->Form->create($deliveryorder) ?>
    <fieldset>
        <legend><?= __('Add Deliveryorder') ?></legend>
        <?php
            echo $this->Form->input('deliveryStatus');
            echo $this->Form->input('deliveryCharge');
            echo $this->Form->input('expectedDeliveryDate', ['empty' => true]);
            echo $this->Form->input('actualDeliveryDate', ['empty' => true]);
            echo $this->Form->input('deliverer');
            echo $this->Form->input('transaction_id', ['options' => $transactions, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
