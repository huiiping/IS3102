<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Delivery Order Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Delivery Orders'), ['controller' => 'DeliveryOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Delivery Order'), ['controller' => 'DeliveryOrders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deliveryOrderItems form large-9 medium-8 columns content">
    <?= $this->Form->create($deliveryOrderItem) ?>
    <fieldset>
        <legend><?= __('Add Delivery Order Item') ?></legend>
        <?php
            echo $this->Form->control('delivery_order_id', ['options' => $deliveryOrders]);
            echo $this->Form->control('item_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
