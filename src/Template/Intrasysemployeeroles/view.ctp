<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Intrasys Employee Role'), ['action' => 'edit', $intrasysEmployeeRole->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Intrasys Employee Role'), ['action' => 'delete', $intrasysEmployeeRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysEmployeeRole->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Intrasys Employee Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intrasys Employee Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Intrasys Employees'), ['controller' => 'IntrasysEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intrasys Employee'), ['controller' => 'IntrasysEmployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="intrasysEmployeeRoles view large-9 medium-8 columns content">
    <h3><?= h($intrasysEmployeeRole->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role Name') ?></th>
            <td><?= h($intrasysEmployeeRole->role_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($intrasysEmployeeRole->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($intrasysEmployeeRole->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($intrasysEmployeeRole->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Role Desc') ?></h4>
        <?= $this->Text->autoParagraph(h($intrasysEmployeeRole->role_desc)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Intrasys Employees') ?></h4>
        <?php if (!empty($intrasysEmployeeRole->intrasys_employees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Account Status') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Contact') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($intrasysEmployeeRole->intrasys_employees as $intrasysEmployees): ?>
            <tr>
                <td><?= h($intrasysEmployees->id) ?></td>
                <td><?= h($intrasysEmployees->first_name) ?></td>
                <td><?= h($intrasysEmployees->last_name) ?></td>
                <td><?= h($intrasysEmployees->account_status) ?></td>
                <td><?= h($intrasysEmployees->username) ?></td>
                <td><?= h($intrasysEmployees->email) ?></td>
                <td><?= h($intrasysEmployees->password) ?></td>
                <td><?= h($intrasysEmployees->address) ?></td>
                <td><?= h($intrasysEmployees->contact) ?></td>
                <td><?= h($intrasysEmployees->created) ?></td>
                <td><?= h($intrasysEmployees->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'IntrasysEmployees', 'action' => 'view', $intrasysEmployees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'IntrasysEmployees', 'action' => 'edit', $intrasysEmployees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'IntrasysEmployees', 'action' => 'delete', $intrasysEmployees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysEmployees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
