<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Intrasys Employees Intrasys Employee Role'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Intrasys Employees'), ['controller' => 'IntrasysEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Intrasys Employee'), ['controller' => 'IntrasysEmployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Intrasys Employee Roles'), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Intrasys Employee Role'), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="intrasysEmployeesIntrasysEmployeeRoles index large-9 medium-8 columns content">
    <h3><?= __('Intrasys Employees Intrasys Employee Roles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('intrasys_employee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('intrasys_employee_role_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($intrasysEmployeesIntrasysEmployeeRoles as $intrasysEmployeesIntrasysEmployeeRole): ?>
            <tr>
                <td><?= $intrasysEmployeesIntrasysEmployeeRole->has('intrasys_employee') ? $this->Html->link($intrasysEmployeesIntrasysEmployeeRole->intrasys_employee->id, ['controller' => 'IntrasysEmployees', 'action' => 'view', $intrasysEmployeesIntrasysEmployeeRole->intrasys_employee->id]) : '' ?></td>
                <td><?= $intrasysEmployeesIntrasysEmployeeRole->has('intrasys_employee_role') ? $this->Html->link($intrasysEmployeesIntrasysEmployeeRole->intrasys_employee_role->id, ['controller' => 'IntrasysEmployeeRoles', 'action' => 'view', $intrasysEmployeesIntrasysEmployeeRole->intrasys_employee_role->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $intrasysEmployeesIntrasysEmployeeRole->intrasys_employee_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $intrasysEmployeesIntrasysEmployeeRole->intrasys_employee_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $intrasysEmployeesIntrasysEmployeeRole->intrasys_employee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysEmployeesIntrasysEmployeeRole->intrasys_employee_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
