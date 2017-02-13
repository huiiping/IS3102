<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employeerole'), ['action' => 'edit', $employeerole->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employeerole'), ['action' => 'delete', $employeerole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeerole->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employeeroles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employeerole'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Intrasysemployees'), ['controller' => 'Intrasysemployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intrasysemployee'), ['controller' => 'Intrasysemployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employeeroles view large-9 medium-8 columns content">
    <h3><?= h($employeerole->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role Name') ?></th>
            <td><?= h($employeerole->role_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($employeerole->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($employeerole->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($employeerole->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Role Desc') ?></h4>
        <?= $this->Text->autoParagraph(h($employeerole->role_desc)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Intrasysemployees') ?></h4>
        <?php if (!empty($employeerole->intrasysemployees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Activation Status') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Contact') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employeerole->intrasysemployees as $intrasysemployees): ?>
            <tr>
                <td><?= h($intrasysemployees->id) ?></td>
                <td><?= h($intrasysemployees->first_name) ?></td>
                <td><?= h($intrasysemployees->last_name) ?></td>
                <td><?= h($intrasysemployees->activation_status) ?></td>
                <td><?= h($intrasysemployees->username) ?></td>
                <td><?= h($intrasysemployees->email) ?></td>
                <td><?= h($intrasysemployees->password) ?></td>
                <td><?= h($intrasysemployees->address) ?></td>
                <td><?= h($intrasysemployees->contact) ?></td>
                <td><?= h($intrasysemployees->created) ?></td>
                <td><?= h($intrasysemployees->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Intrasysemployees', 'action' => 'view', $intrasysemployees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Intrasysemployees', 'action' => 'edit', $intrasysemployees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Intrasysemployees', 'action' => 'delete', $intrasysemployees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysemployees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
