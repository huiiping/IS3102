<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Retailer Employees Retailer Employee Role'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employee Roles'), ['controller' => 'RetailerEmployeeRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee Role'), ['controller' => 'RetailerEmployeeRoles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retailerEmployeesRetailerEmployeeRoles index large-9 medium-8 columns content">
    <h3><?= __('Retailer Employees Retailer Employee Roles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailer_employee_role_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($retailerEmployeesRetailerEmployeeRoles as $retailerEmployeesRetailerEmployeeRole): ?>
            <tr>
                <td><?= $retailerEmployeesRetailerEmployeeRole->has('retailer_employee') ? $this->Html->link($retailerEmployeesRetailerEmployeeRole->retailer_employee->id, ['controller' => 'RetailerEmployees', 'action' => 'view', $retailerEmployeesRetailerEmployeeRole->retailer_employee->id]) : '' ?></td>
                <td><?= $retailerEmployeesRetailerEmployeeRole->has('retailer_employee_role') ? $this->Html->link($retailerEmployeesRetailerEmployeeRole->retailer_employee_role->id, ['controller' => 'RetailerEmployeeRoles', 'action' => 'view', $retailerEmployeesRetailerEmployeeRole->retailer_employee_role->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $retailerEmployeesRetailerEmployeeRole->retailer_employee_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $retailerEmployeesRetailerEmployeeRole->retailer_employee_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $retailerEmployeesRetailerEmployeeRole->retailer_employee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerEmployeesRetailerEmployeeRole->retailer_employee_id)]) ?>
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
