<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <?= $this->Element('sideBar', array('type' => 'Announcement', 'typePlural' => 'announcements')); ?>
</nav>
<div class="announcements form large-9 medium-8 columns content">
    <?= $this->Form->create($announcement) ?>
    <fieldset>
        <legend><?= __('Edit Announcement') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('message');
            echo $this->Form->input('remarks');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
