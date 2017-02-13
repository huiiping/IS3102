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
        <li><?= $this->Html->link(__('List Announcements'), ['controller' => 'Announcements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Announcement'), ['controller' => 'Announcements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employeeroles'), ['controller' => 'Employeeroles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employeerole'), ['controller' => 'Employeeroles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="intrasysemployees view large-9 medium-8 columns content">
    <h3><?= h($intrasysemployee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($intrasysemployee->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($intrasysemployee->last_name) ?></td>
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
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($intrasysemployee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= $this->Number->format($intrasysemployee->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($intrasysemployee->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($intrasysemployee->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activation Status') ?></th>
            <td><?= $intrasysemployee->activation_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Announcements') ?></h4>
        <?php if (!empty($intrasysemployee->announcements)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Remarks') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($intrasysemployee->announcements as $announcements): ?>
            <tr>
                <td><?= h($announcements->id) ?></td>
                <td><?= h($announcements->title) ?></td>
                <td><?= h($announcements->message) ?></td>
                <td><?= h($announcements->remarks) ?></td>
                <td><?= h($announcements->created) ?></td>
                <td><?= h($announcements->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Announcements', 'action' => 'view', $announcements->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Announcements', 'action' => 'edit', $announcements->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Announcements', 'action' => 'delete', $announcements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcements->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Employeeroles') ?></h4>
        <?php if (!empty($intrasysemployee->employeeroles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Role Name') ?></th>
                <th scope="col"><?= __('Role Desc') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($intrasysemployee->employeeroles as $employeeroles): ?>
            <tr>
                <td><?= h($employeeroles->id) ?></td>
                <td><?= h($employeeroles->role_name) ?></td>
                <td><?= h($employeeroles->role_desc) ?></td>
                <td><?= h($employeeroles->created) ?></td>
                <td><?= h($employeeroles->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Employeeroles', 'action' => 'view', $employeeroles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Employeeroles', 'action' => 'edit', $employeeroles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employeeroles', 'action' => 'delete', $employeeroles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeroles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
