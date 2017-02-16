<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Customers Promotionemails'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Promotionemails'), ['controller' => 'Promotionemails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotionemail'), ['controller' => 'Promotionemails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customersPromotionemails form large-9 medium-8 columns content">
    <?= $this->Form->create($customersPromotionemail) ?>
    <fieldset>
        <legend><?= __('Add Customers Promotionemail') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
