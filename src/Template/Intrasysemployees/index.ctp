<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Intrasysemployee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Announcements'), ['controller' => 'Announcements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Announcement'), ['controller' => 'Announcements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employeeroles'), ['controller' => 'Employeeroles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employeerole'), ['controller' => 'Employeeroles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="intrasysemployees index large-9 medium-8 columns content">
    <h3><?= __('Intrasysemployees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('firstName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activationStatus') ?></th>
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
            <?php foreach ($intrasysemployees as $intrasysemployee): ?>
            <tr>
                <td><?= $this->Number->format($intrasysemployee->id) ?></td>
                <td><?= h($intrasysemployee->firstName) ?></td>
                <td><?= h($intrasysemployee->lastName) ?></td>
                <td><?= h($intrasysemployee->activationStatus) ?></td>
                <td><?= h($intrasysemployee->username) ?></td>
                <td><?= h($intrasysemployee->email) ?></td>
                <td><?= h($intrasysemployee->password) ?></td>
                <td><?= h($intrasysemployee->address) ?></td>
                <td><?= $this->Number->format($intrasysemployee->contact) ?></td>
                <td><?= h($intrasysemployee->created) ?></td>
                <td><?= h($intrasysemployee->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $intrasysemployee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $intrasysemployee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $intrasysemployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysemployee->id)]) ?>
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
