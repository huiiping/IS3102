<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <?= $this->Element('sideBar', array('type' => 'Announcement', 'typePlural' => 'announcements')); ?>
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
</div>
