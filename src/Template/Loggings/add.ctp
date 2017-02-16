<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Loggings'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="loggings form large-9 medium-8 columns content">
    <?= $this->Form->create($logging) ?>
    <fieldset>
        <legend><?= __('Add Logging') ?></legend>
        <?php
            echo $this->Form->input('type');
            echo $this->Form->input('entity_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>