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
                ['action' => 'delete', $retaileremployeesEmployeerole->retailerEmployee_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $retaileremployeesEmployeerole->retailerEmployee_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees Employeeroles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employeeroles'), ['controller' => 'Employeeroles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employeerole'), ['controller' => 'Employeeroles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retaileremployeesEmployeeroles form large-9 medium-8 columns content">
    <?= $this->Form->create($retaileremployeesEmployeerole) ?>
    <fieldset>
        <legend><?= __('Edit Retaileremployees Employeerole') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
