<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Custmembershiptiers'), ['controller' => 'Custmembershiptiers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Custmembershiptier'), ['controller' => 'Custmembershiptiers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customers form large-9 medium-8 columns content">
    <?= $this->Form->create($customer) ?>
    <fieldset>
        <legend><?= __('Add Customer') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('email');
            echo $this->Form->input('address');
            echo $this->Form->input('contact');
            echo $this->Form->input('firstName');
            echo $this->Form->input('lastName');
            echo $this->Form->input('accountStatus');
            echo $this->Form->input('mailingList');
            echo $this->Form->input('custMembershipTier_id', ['options' => $custmembershiptiers]);
            echo $this->Form->input('promotions._ids', ['options' => $promotions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
