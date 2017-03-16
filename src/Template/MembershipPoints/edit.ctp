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
                ['action' => 'delete', $membershipPoint->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $membershipPoint->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Membership Points'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="membershipPoints form large-9 medium-8 columns content">
    <?= $this->Form->create($membershipPoint) ?>
    <fieldset>
        <legend><?= __('Edit Membership Point') ?></legend>
        <?php
            echo $this->Form->control('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->control('pts');
            echo $this->Form->control('type');
            echo $this->Form->control('remarks');
            echo $this->Form->control('retailer_employee_id', ['options' => $retailerEmployees, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
