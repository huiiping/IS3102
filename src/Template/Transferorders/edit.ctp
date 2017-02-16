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
                ['action' => 'delete', $transferorder->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transferorder->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Transferorders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transferorders form large-9 medium-8 columns content">
    <?= $this->Form->create($transferorder) ?>
    <fieldset>
        <legend><?= __('Edit Transferorder') ?></legend>
        <?php
            echo $this->Form->input('locationFrom');
            echo $this->Form->input('locationTo');
            echo $this->Form->input('trasnferStatus');
            echo $this->Form->input('trasferDate', ['empty' => true]);
            echo $this->Form->input('remarks');
            echo $this->Form->input('locationFrom_id');
            echo $this->Form->input('locationTo_id', ['options' => $locations, 'empty' => true]);
            echo $this->Form->input('retaileremployees._ids', ['options' => $retaileremployees]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
