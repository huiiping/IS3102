<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Retailer Info'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailers'), ['controller' => 'Retailers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer'), ['controller' => 'Retailers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retailerInfo index large-9 medium-8 columns content">
    <h3><?= __('Retailer Info') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('retailer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailer_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailer_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($retailerInfo as $retailerInfo): ?>
            <tr>
                <td><?= $retailerInfo->has('retailer') ? $this->Html->link($retailerInfo->retailer->id, ['controller' => 'Retailers', 'action' => 'view', $retailerInfo->retailer->id]) : '' ?></td>
                <td><?= h($retailerInfo->retailer_name) ?></td>
                <td><?= h($retailerInfo->retailer_email) ?></td>
                <td><?= h($retailerInfo->address) ?></td>
                <td><?= h($retailerInfo->contact) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $retailerInfo->retailer_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $retailerInfo->retailer_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $retailerInfo->retailer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerInfo->retailer_id)]) ?>
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
