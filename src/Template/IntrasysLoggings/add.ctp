<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Intrasys Loggings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retailers'), ['controller' => 'Retailers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer'), ['controller' => 'Retailers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="intrasysLoggings form large-9 medium-8 columns content">
    <?= $this->Form->create($intrasysLogging) ?>
    <fieldset>
        <legend><?= __('Add Intrasys Logging') ?></legend>
        <?php
            echo $this->Form->input('retailer_id', ['options' => $retailers, 'empty' => true]);
            echo $this->Form->input('action');
            echo $this->Form->input('entity');
            echo $this->Form->input('entityid');
            echo $this->Form->input('employeeid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
