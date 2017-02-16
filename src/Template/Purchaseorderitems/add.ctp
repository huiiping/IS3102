<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Purchaseorderitems'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Purchaseorders'), ['controller' => 'Purchaseorders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchaseorder'), ['controller' => 'Purchaseorders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="purchaseorderitems form large-9 medium-8 columns content">
    <?= $this->Form->create($purchaseorderitem) ?>
    <fieldset>
        <legend><?= __('Add Purchaseorderitem') ?></legend>
        <?php
            echo $this->Form->input('productTypeID');
            echo $this->Form->input('itemDesc');
            echo $this->Form->input('quantity');
            echo $this->Form->input('unitPrice');
            echo $this->Form->input('subTotalPrice');
            echo $this->Form->input('purchaseOrder_id', ['options' => $purchaseorders, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
