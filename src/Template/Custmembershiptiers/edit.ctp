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
                ['action' => 'delete', $custmembershiptier->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $custmembershiptier->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Custmembershiptiers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="custmembershiptiers form large-9 medium-8 columns content">
    <?= $this->Form->create($custmembershiptier) ?>
    <fieldset>
        <legend><?= __('Edit Custmembershiptier') ?></legend>
        <?php
            echo $this->Form->input('teirName');
            echo $this->Form->input('validityPeriod');
            echo $this->Form->input('minSpending');
            echo $this->Form->input('membershipFee');
            echo $this->Form->input('membershipPts');
            echo $this->Form->input('redemptionPts');
            echo $this->Form->input('discountRate');
            echo $this->Form->input('birthdayRate');
            echo $this->Form->input('description');
            echo $this->Form->input('retaileremployees._ids', ['options' => $retaileremployees]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
