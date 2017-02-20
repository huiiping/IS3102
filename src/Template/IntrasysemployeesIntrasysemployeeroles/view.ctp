<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Intrasys Employees Intrasys Employee Role'), ['action' => 'edit', $intrasysEmployeesIntrasysEmployeeRole->intrasys_employee_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Intrasys Employees Intrasys Employee Role'), ['action' => 'delete', $intrasysEmployeesIntrasysEmployeeRole->intrasys_employee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysEmployeesIntrasysEmployeeRole->intrasys_employee_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Intrasys Employees Intrasys Employee Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intrasys Employees Intrasys Employee Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Intrasys Employees'), ['controller' => 'IntrasysEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intrasys Employee'), ['controller' => 'IntrasysEmployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Intrasys Employee Roles'), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intrasys Employee Role'), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="intrasysEmployeesIntrasysEmployeeRoles view large-9 medium-8 columns content">
    <h3><?= h($intrasysEmployeesIntrasysEmployeeRole->intrasys_employee_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Intrasys Employee') ?></th>
            <td><?= $intrasysEmployeesIntrasysEmployeeRole->has('intrasys_employee') ? $this->Html->link($intrasysEmployeesIntrasysEmployeeRole->intrasys_employee->id, ['controller' => 'IntrasysEmployees', 'action' => 'view', $intrasysEmployeesIntrasysEmployeeRole->intrasys_employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Intrasys Employee Role') ?></th>
            <td><?= $intrasysEmployeesIntrasysEmployeeRole->has('intrasys_employee_role') ? $this->Html->link($intrasysEmployeesIntrasysEmployeeRole->intrasys_employee_role->id, ['controller' => 'IntrasysEmployeeRoles', 'action' => 'view', $intrasysEmployeesIntrasysEmployeeRole->intrasys_employee_role->id]) : '' ?></td>
        </tr>
    </table>
</div>
