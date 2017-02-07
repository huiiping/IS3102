<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Employeerole'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="employeerole form large-9 medium-8 columns content">
    <?= $this->Form->create($employeerole) ?>
    <fieldset>
        <legend><?= __('Add Employeerole') ?></legend>
        <?php
            echo $this->Form->input('roleName');
            echo $this->Form->input('roleDesc');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
