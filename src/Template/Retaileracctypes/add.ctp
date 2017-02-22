<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Retailer Acc Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retailers'), ['controller' => 'Retailers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer'), ['controller' => 'Retailers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retailerAccTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($retailerAccType) ?>
    <fieldset>
        <legend><?= __('Add Retailer Acc Type') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('num_of_users');
            echo $this->Form->input('num_of_warehouses');
            echo $this->Form->input('num_of_stores');
            echo $this->Form->input('num_of_prod_types');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
