<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Suppliermemos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="suppliermemos form large-9 medium-8 columns content">
    <?= $this->Form->create($suppliermemo) ?>
    <fieldset>
        <legend><?= __('Add Suppliermemo') ?></legend>
        <?php
            echo $this->Form->input('remarks');
            echo $this->Form->input('supplier_id', ['options' => $suppliers, 'empty' => true]);
            echo $this->Form->input('retaileremployees._ids', ['options' => $retaileremployees]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
