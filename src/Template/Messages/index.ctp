<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Message'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="messages index large-9 medium-8 columns content">
    <h3><?= __('Messages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dateCreated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('receiver') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $message): ?>
            <tr>
                <td><?= $this->Number->format($message->id) ?></td>
                <td><?= h($message->title) ?></td>
                <td><?= h($message->dateCreated) ?></td>
                <td><?= $this->Number->format($message->receiver) ?></td>
                <td><?= $this->Number->format($message->sender) ?></td>
                <td><?= h($message->status) ?></td>
                <td><?= h($message->reference_id) ?></td>
                <td><?= $message->has('retaileremployee') ? $this->Html->link($message->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $message->retaileremployee->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $message->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $message->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]) ?>
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
