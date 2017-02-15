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
                ['action' => 'delete', $membershippoint->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $membershippoint->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Membershippoints'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="membershippoints form large-9 medium-8 columns content">
    <?= $this->Form->create($membershippoint) ?>
    <fieldset>
        <legend><?= __('Edit Membershippoint') ?></legend>
        <?php
            echo $this->Form->input('points');
            echo $this->Form->input('addition');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
