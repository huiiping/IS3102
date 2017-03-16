<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Feedbacks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="feedbacks form large-9 medium-8 columns content">
    <?= $this->Form->create($feedback) ?>
    <fieldset>
        <legend><?= __('Add Feedback') ?></legend>
        <?php
            echo $this->Form->control('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->control('customer_first_name');
            echo $this->Form->control('customer_last_name');
            echo $this->Form->control('customer_contact');
            echo $this->Form->control('customer_email');
            echo $this->Form->control('message');
            echo $this->Form->control('status');
            echo $this->Form->control('product_id', ['options' => $products, 'empty' => true]);
            echo $this->Form->control('item_id', ['options' => $items, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
