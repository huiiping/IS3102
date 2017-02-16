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
                ['action' => 'delete', $intrasysemployeerole->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysemployeerole->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Intrasysemployeeroles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Intrasysemployees'), ['controller' => 'Intrasysemployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Intrasysemployee'), ['controller' => 'Intrasysemployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="intrasysemployeeroles form large-9 medium-8 columns content">
    <?= $this->Form->create($intrasysemployeerole) ?>
    <fieldset>
        <legend><?= __('Edit Intrasysemployeerole') ?></legend>
        <?php
            echo $this->Form->input('roleName');
            echo $this->Form->input('roleDesc');
            echo $this->Form->input('intrasysemployees._ids', ['options' => $intrasysemployees]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
