<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Retailer Employees Retailer Employee Role'), ['action' => 'edit', $retailerEmployeesRetailerEmployeeRole->retailer_employee_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Retailer Employees Retailer Employee Role'), ['action' => 'delete', $retailerEmployeesRetailerEmployeeRole->retailer_employee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerEmployeesRetailerEmployeeRole->retailer_employee_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Employees Retailer Employee Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Employees Retailer Employee Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Employee Roles'), ['controller' => 'RetailerEmployeeRoles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Employee Role'), ['controller' => 'RetailerEmployeeRoles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="retailerEmployeesRetailerEmployeeRoles view large-9 medium-8 columns content">
    <h3><?= h($retailerEmployeesRetailerEmployeeRole->retailer_employee_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Retailer Employee') ?></th>
            <td><?= $retailerEmployeesRetailerEmployeeRole->has('retailer_employee') ? $this->Html->link($retailerEmployeesRetailerEmployeeRole->retailer_employee->id, ['controller' => 'RetailerEmployees', 'action' => 'view', $retailerEmployeesRetailerEmployeeRole->retailer_employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retailer Employee Role') ?></th>
            <td><?= $retailerEmployeesRetailerEmployeeRole->has('retailer_employee_role') ? $this->Html->link($retailerEmployeesRetailerEmployeeRole->retailer_employee_role->id, ['controller' => 'RetailerEmployeeRoles', 'action' => 'view', $retailerEmployeesRetailerEmployeeRole->retailer_employee_role->id]) : '' ?></td>
        </tr>
    </table>
</div>
