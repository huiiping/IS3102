<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Announcements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Intrasysemployees'), ['controller' => 'Intrasysemployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Intrasysemployee'), ['controller' => 'Intrasysemployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="announcements form large-9 medium-8 columns content">
    <?= $this->Form->create($announcement) ?>
    <fieldset>
        <legend><?= __('Add Announcement') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('message');
            echo $this->Form->input('remarks');
            echo $this->Form->input('intrasysemployees._ids', ['options' => $intrasysemployees]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
