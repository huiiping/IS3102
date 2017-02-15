<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Intrasysemployees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Announcements'), ['controller' => 'Announcements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Announcement'), ['controller' => 'Announcements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employeeroles'), ['controller' => 'Employeeroles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employeerole'), ['controller' => 'Employeeroles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="intrasysemployees form large-9 medium-8 columns content">
    <?= $this->Form->create($intrasysemployee) ?>
    <fieldset>
        <legend><?= __('Add Intrasysemployee') ?></legend>
        <?php
            echo $this->Form->input('firstName');
            echo $this->Form->input('lastName');
            echo $this->Form->input('activationStatus');
            echo $this->Form->input('username');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('address');
            echo $this->Form->input('contact');
            echo $this->Form->input('announcements._ids', ['options' => $announcements]);
            echo $this->Form->input('employeeroles._ids', ['options' => $employeeroles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
