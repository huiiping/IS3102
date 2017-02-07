<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customer index large-9 medium-8 columns content">
    <h3><?= __('Customer') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('customerId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('firstName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dateJoined') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activationStatus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('membershipStatus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('loyaltyPoints') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customer as $customer): ?>
            <tr>
                <td><?= $this->Number->format($customer->customerId) ?></td>
                <td><?= h($customer->firstName) ?></td>
                <td><?= h($customer->lastName) ?></td>
                <td><?= h($customer->username) ?></td>
                <td><?= h($customer->password) ?></td>
                <td><?= h($customer->email) ?></td>
                <td><?= $this->Number->format($customer->contact) ?></td>
                <td><?= h($customer->dateJoined) ?></td>
                <td><?= h($customer->activationStatus) ?></td>
                <td><?= h($customer->membershipStatus) ?></td>
                <td><?= $this->Number->format($customer->loyaltyPoints) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customer->customerId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->customerId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->customerId], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->customerId)]) ?>
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
