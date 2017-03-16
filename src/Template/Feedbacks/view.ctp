<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Feedback'), ['action' => 'edit', $feedback->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Feedback'), ['action' => 'delete', $feedback->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feedback->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Feedbacks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Feedback'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="feedbacks view large-9 medium-8 columns content">
    <h3><?= h($feedback->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $feedback->has('customer') ? $this->Html->link($feedback->customer->id, ['controller' => 'Customers', 'action' => 'view', $feedback->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer First Name') ?></th>
            <td><?= h($feedback->customer_first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer Last Name') ?></th>
            <td><?= h($feedback->customer_last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer Email') ?></th>
            <td><?= h($feedback->customer_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Message') ?></th>
            <td><?= h($feedback->message) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($feedback->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $feedback->has('product') ? $this->Html->link($feedback->product->id, ['controller' => 'Products', 'action' => 'view', $feedback->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $feedback->has('item') ? $this->Html->link($feedback->item->name, ['controller' => 'Items', 'action' => 'view', $feedback->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($feedback->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer Contact') ?></th>
            <td><?= $this->Number->format($feedback->customer_contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($feedback->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($feedback->created) ?></td>
        </tr>
    </table>
</div>
