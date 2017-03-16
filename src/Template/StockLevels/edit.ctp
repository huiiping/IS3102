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
                ['action' => 'delete', $stockLevel->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $stockLevel->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stock Levels'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stockLevels form large-9 medium-8 columns content">
    <?= $this->Form->create($stockLevel) ?>
    <fieldset>
        <legend><?= __('Edit Stock Level') ?></legend>
        <?php
            echo $this->Form->control('location_id', ['options' => $locations, 'empty' => true]);
            echo $this->Form->control('product_id', ['options' => $products, 'empty' => true]);
            echo $this->Form->control('threshold');
            echo $this->Form->control('status');
            echo $this->Form->control('retailer_employee_id', ['options' => $retailerEmployees, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
