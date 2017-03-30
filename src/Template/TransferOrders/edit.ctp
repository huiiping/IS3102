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
                ['action' => 'delete', $transferOrder->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transferOrder->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Transfer Orders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transferOrders form large-9 medium-8 columns content">
    <?= $this->Form->create($transferOrder) ?>
    <fieldset>
        <legend><?= __('Edit Transfer Order') ?></legend>
        <?php
            echo $this->Form->control('locationFrom');
            echo $this->Form->control('locationTo');
            echo $this->Form->control('status');
            echo $this->Form->control('remarks');
            echo $this->Form->control('retailer_employee_id', ['options' => $retailerEmployees, 'empty' => true]);
            echo $this->Form->control('supplier_id', ['options' => $suppliers, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
