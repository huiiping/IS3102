<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $announcementRecipient->announcement_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $announcementRecipient->announcement_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Announcement Recipients'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Announcements'), ['controller' => 'Announcements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Announcement'), ['controller' => 'Announcements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Intrasys Employees'), ['controller' => 'IntrasysEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Intrasys Employee'), ['controller' => 'IntrasysEmployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="announcementRecipients form large-9 medium-8 columns content">
    <?= $this->Form->create($announcementRecipient) ?>
    <fieldset>
        <legend><?= __('Edit Announcement Recipient') ?></legend>
        <?php
            echo $this->Form->control('is_read');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
