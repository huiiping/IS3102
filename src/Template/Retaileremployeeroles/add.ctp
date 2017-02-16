<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Retaileremployeeroles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retaileremployeeroles form large-9 medium-8 columns content">
    <?= $this->Form->create($retaileremployeerole) ?>
    <fieldset>
        <legend><?= __('Add Retaileremployeerole') ?></legend>
        <?php
            echo $this->Form->input('roleName');
            echo $this->Form->input('roleDesc');
            echo $this->Form->input('retaileremployees._ids', ['options' => $retaileremployees]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
