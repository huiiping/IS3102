<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Intrasys Employee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Intrasys Employee Roles'), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Intrasys Employee Role'), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="intrasysEmployees index large-9 medium-8 columns content">
    <h3><?= __('Intrasys Employees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activation_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activation_token') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recovery_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recovery_token') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($intrasysEmployees as $intrasysEmployee): ?>
            <tr>
                <td><?= $this->Number->format($intrasysEmployee->id) ?></td>
                <td><?= h($intrasysEmployee->first_name) ?></td>
                <td><?= h($intrasysEmployee->last_name) ?></td>
                <td><?= h($intrasysEmployee->activation_status) ?></td>
                <td><?= h($intrasysEmployee->activation_token) ?></td>
                <td><?= h($intrasysEmployee->recovery_status) ?></td>
                <td><?= h($intrasysEmployee->recovery_token) ?></td>
                <td><?= h($intrasysEmployee->username) ?></td>
                <td><?= h($intrasysEmployee->email) ?></td>
                <td><?= h($intrasysEmployee->password) ?></td>
                <td><?= h($intrasysEmployee->address) ?></td>
                <td><?= h($intrasysEmployee->contact) ?></td>
                <td><?= h($intrasysEmployee->created) ?></td>
                <td><?= h($intrasysEmployee->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $intrasysEmployee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $intrasysEmployee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $intrasysEmployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysEmployee->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
