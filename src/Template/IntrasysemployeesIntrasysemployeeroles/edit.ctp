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
                ['action' => 'delete', $intrasysemployeesIntrasysemployeerole->intrasysEmployee_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysemployeesIntrasysemployeerole->intrasysEmployee_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Intrasysemployees Intrasysemployeeroles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Intrasysemployees'), ['controller' => 'Intrasysemployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Intrasysemployee'), ['controller' => 'Intrasysemployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Intrasysemployeeroles'), ['controller' => 'Intrasysemployeeroles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Intrasysemployeerole'), ['controller' => 'Intrasysemployeeroles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="intrasysemployeesIntrasysemployeeroles form large-9 medium-8 columns content">
    <?= $this->Form->create($intrasysemployeesIntrasysemployeerole) ?>
    <fieldset>
        <legend><?= __('Edit Intrasysemployees Intrasysemployeerole') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
