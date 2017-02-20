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
                ['action' => 'delete', $retailerEmployeesRetailerEmployeeRole->retailer_employee_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $retailerEmployeesRetailerEmployeeRole->retailer_employee_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees Retailer Employee Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employee Roles'), ['controller' => 'RetailerEmployeeRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee Role'), ['controller' => 'RetailerEmployeeRoles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retailerEmployeesRetailerEmployeeRoles form large-9 medium-8 columns content">
    <?= $this->Form->create($retailerEmployeesRetailerEmployeeRole) ?>
    <fieldset>
        <legend><?= __('Edit Retailer Employees Retailer Employee Role') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
