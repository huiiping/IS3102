<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployeeroles'), ['controller' => 'Retaileremployeeroles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployeerole'), ['controller' => 'Retaileremployeeroles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retaileremployees form large-9 medium-8 columns content">
    <?= $this->Form->create($retaileremployee) ?>
    <fieldset>
        <legend><?= __('Add Retaileremployee') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('email');
            echo $this->Form->input('address');
            echo $this->Form->input('contact');
            echo $this->Form->input('firstName');
            echo $this->Form->input('lastName');
            echo $this->Form->input('accountStatus');
            echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true]);
            echo $this->Form->input('messages._ids', ['options' => $messages]);
            echo $this->Form->input('retaileremployeeroles._ids', ['options' => $retaileremployeeroles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
