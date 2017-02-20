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
                ['action' => 'delete', $retailerEmployeeRole->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $retailerEmployeeRole->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Retailer Employee Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retailerEmployeeRoles form large-9 medium-8 columns content">
    <?= $this->Form->create($retailerEmployeeRole) ?>
    <fieldset>
        <legend><?= __('Edit Retailer Employee Role') ?></legend>
        <?php
            echo $this->Form->input('role_name');
            echo $this->Form->input('role_desc');
            echo $this->Form->input('retailer_employees._ids', ['options' => $retailerEmployees]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
