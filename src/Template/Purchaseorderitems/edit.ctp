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
                ['action' => 'delete', $purchaseOrderItem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrderItem->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Purchase Order Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Purchase Orders'), ['controller' => 'PurchaseOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchase Order'), ['controller' => 'PurchaseOrders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="purchaseOrderItems form large-9 medium-8 columns content">
    <?= $this->Form->create($purchaseOrderItem) ?>
    <fieldset>
        <legend><?= __('Edit Purchase Order Item') ?></legend>
        <?php
            echo $this->Form->control('item_id');
            echo $this->Form->control('quantity');
            echo $this->Form->control('unit_price');
            echo $this->Form->control('purchase_order_id', ['options' => $purchaseOrders, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
