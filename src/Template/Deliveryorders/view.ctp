<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Deliveryorder'), ['action' => 'edit', $deliveryorder->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Deliveryorder'), ['action' => 'delete', $deliveryorder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryorder->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Deliveryorders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deliveryorder'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deliveryorders view large-9 medium-8 columns content">
    <h3><?= h($deliveryorder->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('DeliveryStatus') ?></th>
            <td><?= h($deliveryorder->deliveryStatus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deliverer') ?></th>
            <td><?= h($deliveryorder->deliverer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction') ?></th>
            <td><?= $deliveryorder->has('transaction') ? $this->Html->link($deliveryorder->transaction->id, ['controller' => 'Transactions', 'action' => 'view', $deliveryorder->transaction->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($deliveryorder->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DeliveryCharge') ?></th>
            <td><?= $this->Number->format($deliveryorder->deliveryCharge) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ExpectedDeliveryDate') ?></th>
            <td><?= h($deliveryorder->expectedDeliveryDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ActualDeliveryDate') ?></th>
            <td><?= h($deliveryorder->actualDeliveryDate) ?></td>
        </tr>
    </table>
</div>
