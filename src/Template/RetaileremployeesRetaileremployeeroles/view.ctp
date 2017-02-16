<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Retaileremployees Retaileremployeerole'), ['action' => 'edit', $retaileremployeesRetaileremployeerole->retailerEmployee_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Retaileremployees Retaileremployeerole'), ['action' => 'delete', $retaileremployeesRetaileremployeerole->retailerEmployee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $retaileremployeesRetaileremployeerole->retailerEmployee_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees Retaileremployeeroles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployees Retaileremployeerole'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployeeroles'), ['controller' => 'Retaileremployeeroles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployeerole'), ['controller' => 'Retaileremployeeroles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="retaileremployeesRetaileremployeeroles view large-9 medium-8 columns content">
    <h3><?= h($retaileremployeesRetaileremployeerole->retailerEmployee_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Retaileremployee') ?></th>
            <td><?= $retaileremployeesRetaileremployeerole->has('retaileremployee') ? $this->Html->link($retaileremployeesRetaileremployeerole->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $retaileremployeesRetaileremployeerole->retaileremployee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retaileremployeerole') ?></th>
            <td><?= $retaileremployeesRetaileremployeerole->has('retaileremployeerole') ? $this->Html->link($retaileremployeesRetaileremployeerole->retaileremployeerole->id, ['controller' => 'Retaileremployeeroles', 'action' => 'view', $retaileremployeesRetaileremployeerole->retaileremployeerole->id]) : '' ?></td>
        </tr>
    </table>
</div>
