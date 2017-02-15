<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Announcement'), ['action' => 'edit', $announcement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Announcement'), ['action' => 'delete', $announcement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Announcements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Announcement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Intrasysemployees'), ['controller' => 'Intrasysemployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intrasysemployee'), ['controller' => 'Intrasysemployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="announcements view large-9 medium-8 columns content">
    <h3><?= h($announcement->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($announcement->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Message') ?></th>
            <td><?= h($announcement->message) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remarks') ?></th>
            <td><?= h($announcement->remarks) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($announcement->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($announcement->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($announcement->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Intrasysemployees') ?></h4>
        <?php if (!empty($announcement->intrasysemployees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('FirstName') ?></th>
                <th scope="col"><?= __('LastName') ?></th>
                <th scope="col"><?= __('ActivationStatus') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Contact') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($announcement->intrasysemployees as $intrasysemployees): ?>
            <tr>
                <td><?= h($intrasysemployees->id) ?></td>
                <td><?= h($intrasysemployees->firstName) ?></td>
                <td><?= h($intrasysemployees->lastName) ?></td>
                <td><?= h($intrasysemployees->activationStatus) ?></td>
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
