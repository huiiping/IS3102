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
                ['action' => 'delete', $supplier->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Purchaseorders'), ['controller' => 'Purchaseorders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchaseorder'), ['controller' => 'Purchaseorders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliermemos'), ['controller' => 'Suppliermemos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Suppliermemo'), ['controller' => 'Suppliermemos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="suppliers form large-9 medium-8 columns content">
    <?= $this->Form->create($supplier) ?>
    <fieldset>
        <legend><?= __('Edit Supplier') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('email');
            echo $this->Form->input('address');
            echo $this->Form->input('contact');
            echo $this->Form->input('supplierName');
            echo $this->Form->input('country');
            echo $this->Form->input('activationStatus');
            echo $this->Form->input('bankAcc');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
