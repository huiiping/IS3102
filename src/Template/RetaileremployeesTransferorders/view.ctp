<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Retaileremployees Transferorder'), ['action' => 'edit', $retaileremployeesTransferorder->retailerEmployee_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Retaileremployees Transferorder'), ['action' => 'delete', $retaileremployeesTransferorder->retailerEmployee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $retaileremployeesTransferorder->retailerEmployee_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees Transferorders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployees Transferorder'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transferorders'), ['controller' => 'Transferorders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transferorder'), ['controller' => 'Transferorders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="retaileremployeesTransferorders view large-9 medium-8 columns content">
    <h3><?= h($retaileremployeesTransferorder->retailerEmployee_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Retaileremployee') ?></th>
            <td><?= $retaileremployeesTransferorder->has('retaileremployee') ? $this->Html->link($retaileremployeesTransferorder->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $retaileremployeesTransferorder->retaileremployee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transferorder') ?></th>
            <td><?= $retaileremployeesTransferorder->has('transferorder') ? $this->Html->link($retaileremployeesTransferorder->transferorder->id, ['controller' => 'Transferorders', 'action' => 'view', $retaileremployeesTransferorder->transferorder->id]) : '' ?></td>
        </tr>
    </table>
</div>
