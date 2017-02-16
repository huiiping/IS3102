<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Retaileremployee'), ['action' => 'edit', $retaileremployee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Retaileremployee'), ['action' => 'delete', $retaileremployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retaileremployee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployeeroles'), ['controller' => 'Retaileremployeeroles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployeerole'), ['controller' => 'Retaileremployeeroles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="retaileremployees view large-9 medium-8 columns content">
    <h3><?= h($retaileremployee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($retaileremployee->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($retaileremployee->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($retaileremployee->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($retaileremployee->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= h($retaileremployee->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FirstName') ?></th>
            <td><?= h($retaileremployee->firstName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LastName') ?></th>
            <td><?= h($retaileremployee->lastName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AccountStatus') ?></th>
            <td><?= h($retaileremployee->accountStatus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $retaileremployee->has('location') ? $this->Html->link($retaileremployee->location->name, ['controller' => 'Locations', 'action' => 'view', $retaileremployee->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($retaileremployee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($retaileremployee->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($retaileremployee->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Messages') ?></h4>
        <?php if (!empty($retaileremployee->messages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('DateCreated') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Reference Id') ?></th>
                <th scope="col"><?= __('Sender Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($retaileremployee->messages as $messages): ?>
            <tr>
                <td><?= h($messages->id) ?></td>
                <td><?= h($messages->title) ?></td>
                <td><?= h($messages->dateCreated) ?></td>
                <td><?= h($messages->message) ?></td>
                <td><?= h($messages->status) ?></td>
                <td><?= h($messages->reference_id) ?></td>
                <td><?= h($messages->sender_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Messages', 'action' => 'view', $messages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Messages', 'action' => 'edit', $messages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Messages', 'action' => 'delete', $messages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $messages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Retaileremployeeroles') ?></h4>
        <?php if (!empty($retaileremployee->retaileremployeeroles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('RoleName') ?></th>
                <th scope="col"><?= __('RoleDesc') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($retaileremployee->retaileremployeeroles as $retaileremployeeroles): ?>
            <tr>
                <td><?= h($retaileremployeeroles->id) ?></td>
                <td><?= h($retaileremployeeroles->roleName) ?></td>
                <td><?= h($retaileremployeeroles->roleDesc) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Retaileremployeeroles', 'action' => 'view', $retaileremployeeroles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Retaileremployeeroles', 'action' => 'edit', $retaileremployeeroles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Retaileremployeeroles', 'action' => 'delete', $retaileremployeeroles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retaileremployeeroles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
