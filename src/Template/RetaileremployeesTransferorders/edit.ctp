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
                ['action' => 'delete', $retaileremployeesTransferorder->retailerEmployee_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $retaileremployeesTransferorder->retailerEmployee_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees Transferorders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transferorders'), ['controller' => 'Transferorders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transferorder'), ['controller' => 'Transferorders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retaileremployeesTransferorders form large-9 medium-8 columns content">
    <?= $this->Form->create($retaileremployeesTransferorder) ?>
    <fieldset>
        <legend><?= __('Edit Retaileremployees Transferorder') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
