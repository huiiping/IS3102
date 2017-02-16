<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Retaileracctype'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retaileracctypes index large-9 medium-8 columns content">
    <h3><?= __('Retaileracctypes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numOfUsers') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numOfWarehouses') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numOfStores') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numOfProdTypes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($retaileracctypes as $retaileracctype): ?>
            <tr>
                <td><?= $this->Number->format($retaileracctype->id) ?></td>
                <td><?= h($retaileracctype->name) ?></td>
                <td><?= $this->Number->format($retaileracctype->numOfUsers) ?></td>
                <td><?= $this->Number->format($retaileracctype->numOfWarehouses) ?></td>
                <td><?= $this->Number->format($retaileracctype->numOfStores) ?></td>
                <td><?= $this->Number->format($retaileracctype->numOfProdTypes) ?></td>
                <td><?= h($retaileracctype->created) ?></td>
                <td><?= h($retaileracctype->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $retaileracctype->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $retaileracctype->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $retaileracctype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retaileracctype->id)]) ?>
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