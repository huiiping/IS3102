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
                ['action' => 'delete', $incidentreport->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $incidentreport->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Incidentreports'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="incidentreports form large-9 medium-8 columns content">
    <?= $this->Form->create($incidentreport) ?>
    <fieldset>
        <legend><?= __('Edit Incidentreport') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('dateCreated', ['empty' => true]);
            echo $this->Form->input('status');
            echo $this->Form->input('reference_id');
            echo $this->Form->input('employee_id', ['options' => $retaileremployees, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
