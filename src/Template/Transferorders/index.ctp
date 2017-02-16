<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Transferorder'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transferorders index large-9 medium-8 columns content">
    <h3><?= __('Transferorders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locationFrom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locationTo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trasnferStatus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trasferDate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locationFrom_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locationTo_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transferorders as $transferorder): ?>
            <tr>
                <td><?= $this->Number->format($transferorder->id) ?></td>
                <td><?= $this->Number->format($transferorder->locationFrom) ?></td>
                <td><?= $this->Number->format($transferorder->locationTo) ?></td>
                <td><?= h($transferorder->trasnferStatus) ?></td>
                <td><?= h($transferorder->trasferDate) ?></td>
                <td><?= $this->Number->format($transferorder->locationFrom_id) ?></td>
                <td><?= $transferorder->has('location') ? $this->Html->link($transferorder->location->name, ['controller' => 'Locations', 'action' => 'view', $transferorder->location->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $transferorder->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transferorder->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transferorder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferorder->id)]) ?>
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
