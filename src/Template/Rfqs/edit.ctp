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
                ['action' => 'delete', $rfq->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rfq->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rfqs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rfq Suppliers'), ['controller' => 'RfqSuppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rfq Supplier'), ['controller' => 'RfqSuppliers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rfqs form large-9 medium-8 columns content">
    <?= $this->Form->create($rfq) ?>
    <fieldset>
        <legend><?= __('Edit Rfq') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('body');
            echo $this->Form->control('retailer_employee_id', ['options' => $retailerEmployees, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
