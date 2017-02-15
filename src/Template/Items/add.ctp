<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prodtypes'), ['controller' => 'Prodtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prodtype'), ['controller' => 'Prodtypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Deliveryorderitems'), ['controller' => 'Deliveryorderitems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deliveryorderitem'), ['controller' => 'Deliveryorderitems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transactionitems'), ['controller' => 'Transactionitems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transactionitem'), ['controller' => 'Transactionitems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transferorderitems'), ['controller' => 'Transferorderitems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transferorderitem'), ['controller' => 'Transferorderitems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="items form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Add Item') ?></legend>
        <?php
            echo $this->Form->input('itemName');
            echo $this->Form->input('itemDesc');
            echo $this->Form->input('EPC');
            echo $this->Form->input('barcode');
            echo $this->Form->input('itemStatus');
            echo $this->Form->input('defective');
            echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true]);
            echo $this->Form->input('prodType_id', ['options' => $prodtypes, 'empty' => true]);
            echo $this->Form->input('section_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
