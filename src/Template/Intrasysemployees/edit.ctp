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
                ['action' => 'delete', $intrasysEmployee->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysEmployee->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Intrasys Employees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Intrasys Employee Roles'), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Intrasys Employee Role'), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="intrasysEmployees form large-9 medium-8 columns content">
    <?= $this->Form->create($intrasysEmployee) ?>
    <fieldset>
        <legend><?= __('Edit Intrasys Employee') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('account_status');
            echo $this->Form->input('username');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('address');
            echo $this->Form->input('contact');
            echo $this->Form->input('intrasys_employee_roles._ids', ['options' => $intrasysEmployeeRoles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
