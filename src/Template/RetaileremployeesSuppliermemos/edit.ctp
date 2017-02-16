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
                ['action' => 'delete', $retaileremployeesSuppliermemo->retailerEmployee_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $retaileremployeesSuppliermemo->retailerEmployee_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees Suppliermemos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliermemos'), ['controller' => 'Suppliermemos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Suppliermemo'), ['controller' => 'Suppliermemos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retaileremployeesSuppliermemos form large-9 medium-8 columns content">
    <?= $this->Form->create($retaileremployeesSuppliermemo) ?>
    <fieldset>
        <legend><?= __('Edit Retaileremployees Suppliermemo') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
