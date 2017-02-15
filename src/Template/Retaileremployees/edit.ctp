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
                ['action' => 'delete', $retaileremployee->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $retaileremployee->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Custmembershiptiers'), ['controller' => 'Custmembershiptiers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Custmembershiptier'), ['controller' => 'Custmembershiptiers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employeeroles'), ['controller' => 'Employeeroles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employeerole'), ['controller' => 'Employeeroles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliermemos'), ['controller' => 'Suppliermemos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Suppliermemo'), ['controller' => 'Suppliermemos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transferorders'), ['controller' => 'Transferorders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transferorder'), ['controller' => 'Transferorders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retaileremployees form large-9 medium-8 columns content">
    <?= $this->Form->create($retaileremployee) ?>
    <fieldset>
        <legend><?= __('Edit Retaileremployee') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('email');
            echo $this->Form->input('address');
            echo $this->Form->input('contact');
            echo $this->Form->input('firstName');
            echo $this->Form->input('lastName');
            echo $this->Form->input('activationStatus');
            echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true]);
            echo $this->Form->input('custmembershiptiers._ids', ['options' => $custmembershiptiers]);
            echo $this->Form->input('customers._ids', ['options' => $customers]);
            echo $this->Form->input('employeeroles._ids', ['options' => $employeeroles]);
            echo $this->Form->input('suppliermemos._ids', ['options' => $suppliermemos]);
            echo $this->Form->input('transactions._ids', ['options' => $transactions]);
            echo $this->Form->input('transferorders._ids', ['options' => $transferorders]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
