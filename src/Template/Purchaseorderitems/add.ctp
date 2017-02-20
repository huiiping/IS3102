<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Purchase Order Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Purchase Orders'), ['controller' => 'PurchaseOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchase Order'), ['controller' => 'PurchaseOrders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="purchaseOrderItems form large-9 medium-8 columns content">
    <?= $this->Form->create($purchaseOrderItem) ?>
    <fieldset>
        <legend><?= __('Add Purchase Order Item') ?></legend>
        <?php
            echo $this->Form->input('item_ID');
            echo $this->Form->input('item_name');
            echo $this->Form->input('item_desc');
            echo $this->Form->input('quantity');
            echo $this->Form->input('unit_price');
            echo $this->Form->input('sub_total_price');
            echo $this->Form->input('purchase_order_id', ['options' => $purchaseOrders, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
