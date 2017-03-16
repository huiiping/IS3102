<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Quotations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="quotations form large-9 medium-8 columns content">
    <?= $this->Form->create($quotation) ?>
    <fieldset>
        <legend><?= __('Add Quotation') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('message');
            echo $this->Form->control('retailer_employee_id', ['options' => $retailerEmployees, 'empty' => true]);
            echo $this->Form->control('supplier_id', ['options' => $suppliers, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
