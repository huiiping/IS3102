<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Retaileremployees Message'), ['action' => 'edit', $retaileremployeesMessage->retailerEmployee_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Retaileremployees Message'), ['action' => 'delete', $retaileremployeesMessage->retailerEmployee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $retaileremployeesMessage->retailerEmployee_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployees Message'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="retaileremployeesMessages view large-9 medium-8 columns content">
    <h3><?= h($retaileremployeesMessage->retailerEmployee_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Retaileremployee') ?></th>
            <td><?= $retaileremployeesMessage->has('retaileremployee') ? $this->Html->link($retaileremployeesMessage->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $retaileremployeesMessage->retaileremployee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Message') ?></th>
            <td><?= $retaileremployeesMessage->has('message') ? $this->Html->link($retaileremployeesMessage->message->title, ['controller' => 'Messages', 'action' => 'view', $retaileremployeesMessage->message->id]) : '' ?></td>
        </tr>
    </table>
</div>
