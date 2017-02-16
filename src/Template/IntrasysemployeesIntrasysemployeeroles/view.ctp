<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Intrasysemployees Intrasysemployeerole'), ['action' => 'edit', $intrasysemployeesIntrasysemployeerole->intrasysEmployee_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Intrasysemployees Intrasysemployeerole'), ['action' => 'delete', $intrasysemployeesIntrasysemployeerole->intrasysEmployee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysemployeesIntrasysemployeerole->intrasysEmployee_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Intrasysemployees Intrasysemployeeroles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intrasysemployees Intrasysemployeerole'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Intrasysemployees'), ['controller' => 'Intrasysemployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intrasysemployee'), ['controller' => 'Intrasysemployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Intrasysemployeeroles'), ['controller' => 'Intrasysemployeeroles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intrasysemployeerole'), ['controller' => 'Intrasysemployeeroles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="intrasysemployeesIntrasysemployeeroles view large-9 medium-8 columns content">
    <h3><?= h($intrasysemployeesIntrasysemployeerole->intrasysEmployee_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Intrasysemployee') ?></th>
            <td><?= $intrasysemployeesIntrasysemployeerole->has('intrasysemployee') ? $this->Html->link($intrasysemployeesIntrasysemployeerole->intrasysemployee->id, ['controller' => 'Intrasysemployees', 'action' => 'view', $intrasysemployeesIntrasysemployeerole->intrasysemployee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Intrasysemployeerole') ?></th>
            <td><?= $intrasysemployeesIntrasysemployeerole->has('intrasysemployeerole') ? $this->Html->link($intrasysemployeesIntrasysemployeerole->intrasysemployeerole->id, ['controller' => 'Intrasysemployeeroles', 'action' => 'view', $intrasysemployeesIntrasysemployeerole->intrasysemployeerole->id]) : '' ?></td>
        </tr>
    </table>
</div>
