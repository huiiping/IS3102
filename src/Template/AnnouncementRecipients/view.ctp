<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Announcement Recipient'), ['action' => 'edit', $announcementRecipient->announcement_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Announcement Recipient'), ['action' => 'delete', $announcementRecipient->announcement_id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcementRecipient->announcement_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Announcement Recipients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Announcement Recipient'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Announcements'), ['controller' => 'Announcements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Announcement'), ['controller' => 'Announcements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Intrasys Employees'), ['controller' => 'IntrasysEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intrasys Employee'), ['controller' => 'IntrasysEmployees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="announcementRecipients view large-9 medium-8 columns content">
    <h3><?= h($announcementRecipient->announcement_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Announcement') ?></th>
            <td><?= $announcementRecipient->has('announcement') ? $this->Html->link($announcementRecipient->announcement->title, ['controller' => 'Announcements', 'action' => 'view', $announcementRecipient->announcement->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Intrasys Employee') ?></th>
            <td><?= $announcementRecipient->has('intrasys_employee') ? $this->Html->link($announcementRecipient->intrasys_employee->last_name, ['controller' => 'IntrasysEmployees', 'action' => 'view', $announcementRecipient->intrasys_employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Read') ?></th>
            <td><?= $announcementRecipient->is_read ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
