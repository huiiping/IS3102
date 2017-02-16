<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Intrasysemployee'), ['action' => 'edit', $intrasysemployee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Intrasysemployee'), ['action' => 'delete', $intrasysemployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysemployee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Intrasysemployees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intrasysemployee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Intrasysemployeeroles'), ['controller' => 'Intrasysemployeeroles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intrasysemployeerole'), ['controller' => 'Intrasysemployeeroles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="intrasysemployees view large-9 medium-8 columns content">
    <h3><?= h($intrasysemployee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('FirstName') ?></th>
            <td><?= h($intrasysemployee->firstName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LastName') ?></th>
            <td><?= h($intrasysemployee->lastName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AccountStatus') ?></th>
            <td><?= h($intrasysemployee->accountStatus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($intrasysemployee->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($intrasysemployee->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($intrasysemployee->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($intrasysemployee->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= h($intrasysemployee->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($intrasysemployee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($intrasysemployee->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($intrasysemployee->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Intrasysemployeeroles') ?></h4>
        <?php if (!empty($intrasysemployee->intrasysemployeeroles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('RoleName') ?></th>
                <th scope="col"><?= __('RoleDesc') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($intrasysemployee->intrasysemployeeroles as $intrasysemployeeroles): ?>
            <tr>
                <td><?= h($intrasysemployeeroles->id) ?></td>
                <td><?= h($intrasysemployeeroles->roleName) ?></td>
                <td><?= h($intrasysemployeeroles->roleDesc) ?></td>
                <td><?= h($intrasysemployeeroles->created) ?></td>
                <td><?= h($intrasysemployeeroles->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Intrasysemployeeroles', 'action' => 'view', $intrasysemployeeroles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Intrasysemployeeroles', 'action' => 'edit', $intrasysemployeeroles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Intrasysemployeeroles', 'action' => 'delete', $intrasysemployeeroles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysemployeeroles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
