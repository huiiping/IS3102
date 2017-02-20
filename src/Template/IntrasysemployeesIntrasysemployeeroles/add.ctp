<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Intrasys Employees Intrasys Employee Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Intrasys Employees'), ['controller' => 'IntrasysEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Intrasys Employee'), ['controller' => 'IntrasysEmployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Intrasys Employee Roles'), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Intrasys Employee Role'), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="intrasysEmployeesIntrasysEmployeeRoles form large-9 medium-8 columns content">
    <?= $this->Form->create($intrasysEmployeesIntrasysEmployeeRole) ?>
    <fieldset>
        <legend><?= __('Add Intrasys Employees Intrasys Employee Role') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
