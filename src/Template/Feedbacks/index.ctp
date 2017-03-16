<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Feedback'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="feedbacks index large-9 medium-8 columns content">
    <h3><?= __('Feedbacks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_contact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('message') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($feedbacks as $feedback): ?>
            <tr>
                <td><?= $this->Number->format($feedback->id) ?></td>
                <td><?= $feedback->has('customer') ? $this->Html->link($feedback->customer->id, ['controller' => 'Customers', 'action' => 'view', $feedback->customer->id]) : '' ?></td>
                <td><?= h($feedback->customer_first_name) ?></td>
                <td><?= h($feedback->customer_last_name) ?></td>
                <td><?= $this->Number->format($feedback->customer_contact) ?></td>
                <td><?= h($feedback->customer_email) ?></td>
                <td><?= h($feedback->message) ?></td>
                <td><?= h($feedback->status) ?></td>
                <td><?= $feedback->has('product') ? $this->Html->link($feedback->product->id, ['controller' => 'Products', 'action' => 'view', $feedback->product->id]) : '' ?></td>
                <td><?= $feedback->has('item') ? $this->Html->link($feedback->item->name, ['controller' => 'Items', 'action' => 'view', $feedback->item->id]) : '' ?></td>
                <td><?= h($feedback->modified) ?></td>
                <td><?= h($feedback->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $feedback->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $feedback->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $feedback->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feedback->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
