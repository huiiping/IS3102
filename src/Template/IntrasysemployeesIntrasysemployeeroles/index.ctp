<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Intrasysemployees Intrasysemployeerole'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Intrasysemployees'), ['controller' => 'Intrasysemployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Intrasysemployee'), ['controller' => 'Intrasysemployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Intrasysemployeeroles'), ['controller' => 'Intrasysemployeeroles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Intrasysemployeerole'), ['controller' => 'Intrasysemployeeroles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="intrasysemployeesIntrasysemployeeroles index large-9 medium-8 columns content">
    <h3><?= __('Intrasysemployees Intrasysemployeeroles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('intrasysEmployee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('intrasysEmployeeRole_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($intrasysemployeesIntrasysemployeeroles as $intrasysemployeesIntrasysemployeerole): ?>
            <tr>
                <td><?= $intrasysemployeesIntrasysemployeerole->has('intrasysemployee') ? $this->Html->link($intrasysemployeesIntrasysemployeerole->intrasysemployee->id, ['controller' => 'Intrasysemployees', 'action' => 'view', $intrasysemployeesIntrasysemployeerole->intrasysemployee->id]) : '' ?></td>
                <td><?= $intrasysemployeesIntrasysemployeerole->has('intrasysemployeerole') ? $this->Html->link($intrasysemployeesIntrasysemployeerole->intrasysemployeerole->id, ['controller' => 'Intrasysemployeeroles', 'action' => 'view', $intrasysemployeesIntrasysemployeerole->intrasysemployeerole->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $intrasysemployeesIntrasysemployeerole->intrasysEmployee_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $intrasysemployeesIntrasysemployeerole->intrasysEmployee_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $intrasysemployeesIntrasysemployeerole->intrasysEmployee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysemployeesIntrasysemployeerole->intrasysEmployee_id)]) ?>
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
