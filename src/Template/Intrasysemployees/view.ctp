<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Intrasys Employee'), ['action' => 'edit', $intrasysEmployee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Intrasys Employee'), ['action' => 'delete', $intrasysEmployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysEmployee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Intrasys Employees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intrasys Employee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Intrasys Employee Roles'), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intrasys Employee Role'), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="intrasysEmployees view large-9 medium-8 columns content">
    <h3><?= h($intrasysEmployee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($intrasysEmployee->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($intrasysEmployee->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activation Status') ?></th>
            <td><?= h($intrasysEmployee->activation_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activation Token') ?></th>
            <td><?= h($intrasysEmployee->activation_token) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Recovery Status') ?></th>
            <td><?= h($intrasysEmployee->recovery_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Recovery Token') ?></th>
            <td><?= h($intrasysEmployee->recovery_token) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($intrasysEmployee->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($intrasysEmployee->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($intrasysEmployee->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($intrasysEmployee->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= h($intrasysEmployee->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($intrasysEmployee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($intrasysEmployee->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($intrasysEmployee->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Intrasys Employee Roles') ?></h4>
        <?php if (!empty($intrasysEmployee->intrasys_employee_roles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Role Name') ?></th>
                <th scope="col"><?= __('Role Desc') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($intrasysEmployee->intrasys_employee_roles as $intrasysEmployeeRoles): ?>
            <tr>
                <td><?= h($intrasysEmployeeRoles->id) ?></td>
                <td><?= h($intrasysEmployeeRoles->role_name) ?></td>
                <td><?= h($intrasysEmployeeRoles->role_desc) ?></td>
                <td><?= h($intrasysEmployeeRoles->created) ?></td>
                <td><?= h($intrasysEmployeeRoles->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'view', $intrasysEmployeeRoles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'edit', $intrasysEmployeeRoles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'delete', $intrasysEmployeeRoles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysEmployeeRoles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
