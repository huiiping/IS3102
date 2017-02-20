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
                ['action' => 'delete', $intrasysEmployeeRole->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysEmployeeRole->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Intrasys Employee Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Intrasys Employees'), ['controller' => 'IntrasysEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Intrasys Employee'), ['controller' => 'IntrasysEmployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="intrasysEmployeeRoles form large-9 medium-8 columns content">
    <?= $this->Form->create($intrasysEmployeeRole) ?>
    <fieldset>
        <legend><?= __('Edit Intrasys Employee Role') ?></legend>
        <?php
            echo $this->Form->input('role_name');
            echo $this->Form->input('role_desc');
            echo $this->Form->input('intrasys_employees._ids', ['options' => $intrasysEmployees]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
