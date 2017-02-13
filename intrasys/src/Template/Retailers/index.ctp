<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Retailer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retaileracctypes'), ['controller' => 'Retaileracctypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileracctype'), ['controller' => 'Retaileracctypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retailers index large-9 medium-8 columns content">
    <h3><?= __('Retailers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activation_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_term') ?></th>
                <th scope="col"><?= $this->Paginator->sort('loyalty_points') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contractStartDate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contractEndDate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retaileracctype_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($retailers as $retailer): ?>
            <tr>
                <td><?= $this->Number->format($retailer->id) ?></td>
                <td><?= h($retailer->company_name) ?></td>
                <td><?= h($retailer->last_name) ?></td>
                <td><?= h($retailer->activation_status) ?></td>
                <td><?= h($retailer->payment_term) ?></td>
                <td><?= $this->Number->format($retailer->loyalty_points) ?></td>
                <td><?= h($retailer->username) ?></td>
                <td><?= h($retailer->email) ?></td>
                <td><?= h($retailer->password) ?></td>
                <td><?= h($retailer->address) ?></td>
                <td><?= $this->Number->format($retailer->contact) ?></td>
                <td><?= h($retailer->contractStartDate) ?></td>
                <td><?= h($retailer->contractEndDate) ?></td>
                <td><?= h($retailer->created) ?></td>
                <td><?= h($retailer->modified) ?></td>
                <td><?= $retailer->has('retaileracctype') ? $this->Html->link($retailer->retaileracctype->name, ['controller' => 'Retaileracctypes', 'action' => 'view', $retailer->retaileracctype->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $retailer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $retailer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $retailer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailer->id)]) ?>
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
