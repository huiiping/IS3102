<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployeeroles'), ['controller' => 'Retaileremployeeroles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployeerole'), ['controller' => 'Retaileremployeeroles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retaileremployees index large-9 medium-8 columns content">
    <h3><?= __('Retaileremployees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('firstName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('accountStatus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($retaileremployees as $retaileremployee): ?>
            <tr>
                <td><?= $this->Number->format($retaileremployee->id) ?></td>
                <td><?= h($retaileremployee->username) ?></td>
                <td><?= h($retaileremployee->password) ?></td>
                <td><?= h($retaileremployee->email) ?></td>
                <td><?= h($retaileremployee->address) ?></td>
                <td><?= h($retaileremployee->contact) ?></td>
                <td><?= h($retaileremployee->created) ?></td>
                <td><?= h($retaileremployee->modified) ?></td>
                <td><?= h($retaileremployee->firstName) ?></td>
                <td><?= h($retaileremployee->lastName) ?></td>
                <td><?= h($retaileremployee->accountStatus) ?></td>
                <td><?= $retaileremployee->has('location') ? $this->Html->link($retaileremployee->location->name, ['controller' => 'Locations', 'action' => 'view', $retaileremployee->location->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $retaileremployee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $retaileremployee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $retaileremployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retaileremployee->id)]) ?>
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
