<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Announcement Recipient'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Announcements'), ['controller' => 'Announcements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Announcement'), ['controller' => 'Announcements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Intrasys Employees'), ['controller' => 'IntrasysEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Intrasys Employee'), ['controller' => 'IntrasysEmployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="announcementRecipients index large-9 medium-8 columns content">
    <h3><?= __('Announcement Recipients') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('announcement_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('intrasys_employee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_read') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($announcementRecipients as $announcementRecipient): ?>
            <tr>
                <td><?= $announcementRecipient->has('announcement') ? $this->Html->link($announcementRecipient->announcement->title, ['controller' => 'Announcements', 'action' => 'view', $announcementRecipient->announcement->id]) : '' ?></td>
                <td><?= $announcementRecipient->has('intrasys_employee') ? $this->Html->link($announcementRecipient->intrasys_employee->last_name, ['controller' => 'IntrasysEmployees', 'action' => 'view', $announcementRecipient->intrasys_employee->id]) : '' ?></td>
                <td><?= h($announcementRecipient->is_read) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $announcementRecipient->announcement_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $announcementRecipient->announcement_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $announcementRecipient->announcement_id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcementRecipient->announcement_id)]) ?>
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
