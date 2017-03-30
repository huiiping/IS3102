<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Transfer Orders Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Transfer Orders'), ['controller' => 'TransferOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transfer Order'), ['controller' => 'TransferOrders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transferOrdersItems form large-9 medium-8 columns content">
    <?= $this->Form->create($transferOrdersItem) ?>
    <fieldset>
        <legend><?= __('Add Transfer Orders Item') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
