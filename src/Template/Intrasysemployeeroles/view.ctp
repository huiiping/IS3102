<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Intrasysemployeerole'), ['action' => 'edit', $intrasysemployeerole->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Intrasysemployeerole'), ['action' => 'delete', $intrasysemployeerole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysemployeerole->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Intrasysemployeeroles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intrasysemployeerole'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Intrasysemployees'), ['controller' => 'Intrasysemployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intrasysemployee'), ['controller' => 'Intrasysemployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="intrasysemployeeroles view large-9 medium-8 columns content">
    <h3><?= h($intrasysemployeerole->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('RoleName') ?></th>
            <td><?= h($intrasysemployeerole->roleName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($intrasysemployeerole->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($intrasysemployeerole->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($intrasysemployeerole->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('RoleDesc') ?></h4>
        <?= $this->Text->autoParagraph(h($intrasysemployeerole->roleDesc)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Intrasysemployees') ?></h4>
        <?php if (!empty($intrasysemployeerole->intrasysemployees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('FirstName') ?></th>
                <th scope="col"><?= __('LastName') ?></th>
                <th scope="col"><?= __('AccountStatus') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Contact') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($intrasysemployeerole->intrasysemployees as $intrasysemployees): ?>
            <tr>
                <td><?= h($intrasysemployees->id) ?></td>
                <td><?= h($intrasysemployees->firstName) ?></td>
                <td><?= h($intrasysemployees->lastName) ?></td>
                <td><?= h($intrasysemployees->accountStatus) ?></td>
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
