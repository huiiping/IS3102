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
                ['action' => 'delete', $prodcat->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $prodcat->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Prodcats'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prodcats form large-9 medium-8 columns content">
    <?= $this->Form->create($prodcat) ?>
    <fieldset>
        <legend><?= __('Edit Prodcat') ?></legend>
        <?php
            echo $this->Form->input('catName');
            echo $this->Form->input('catDesc');
            echo $this->Form->input('employee_id', ['options' => $retaileremployees, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
