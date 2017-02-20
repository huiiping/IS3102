<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Intrasys Employee Role'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Intrasys Employees'), ['controller' => 'IntrasysEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Intrasys Employee'), ['controller' => 'IntrasysEmployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="intrasysEmployeeRoles index large-9 medium-8 columns content">
    <h3><?= __('Intrasys Employee Roles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($intrasysEmployeeRoles as $intrasysEmployeeRole): ?>
            <tr>
                <td><?= $this->Number->format($intrasysEmployeeRole->id) ?></td>
                <td><?= h($intrasysEmployeeRole->role_name) ?></td>
                <td><?= h($intrasysEmployeeRole->created) ?></td>
                <td><?= h($intrasysEmployeeRole->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $intrasysEmployeeRole->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $intrasysEmployeeRole->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $intrasysEmployeeRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysEmployeeRole->id)]) ?>
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
