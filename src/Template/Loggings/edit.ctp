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
                ['action' => 'delete', $logging->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $logging->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Loggings'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="loggings form large-9 medium-8 columns content">
    <?= $this->Form->create($logging) ?>
    <fieldset>
        <legend><?= __('Edit Logging') ?></legend>
        <?php
            echo $this->Form->input('type');
            echo $this->Form->input('entity_num');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
