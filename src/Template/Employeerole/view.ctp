<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employeerole'), ['action' => 'edit', $employeerole->employeeRoleId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employeerole'), ['action' => 'delete', $employeerole->employeeRoleId], ['confirm' => __('Are you sure you want to delete # {0}?', $employeerole->employeeRoleId)]) ?> </li>
        <li><?= $this->Html->link(__('List Employeerole'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employeerole'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employeerole view large-9 medium-8 columns content">
    <h3><?= h($employeerole->employeeRoleId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('RoleName') ?></th>
            <td><?= h($employeerole->roleName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EmployeeRoleId') ?></th>
            <td><?= $this->Number->format($employeerole->employeeRoleId) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('RoleDesc') ?></h4>
        <?= $this->Text->autoParagraph(h($employeerole->roleDesc)); ?>
    </div>
</div>
