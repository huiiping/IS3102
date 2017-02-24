<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Intrasys Logging'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailers'), ['controller' => 'Retailers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer'), ['controller' => 'Retailers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="intrasysLoggings index large-9 medium-8 columns content">
    <h3><?= __('Intrasys Loggings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('action') ?></th>
                <th scope="col"><?= $this->Paginator->sort('entity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('entityid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employeeid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($intrasysLoggings as $intrasysLogging): ?>
            <tr>
                <td><?= $this->Number->format($intrasysLogging->id) ?></td>
                <td><?= $intrasysLogging->has('retailer') ? $this->Html->link($intrasysLogging->retailer->id, ['controller' => 'Retailers', 'action' => 'view', $intrasysLogging->retailer->id]) : '' ?></td>
                <td><?= h($intrasysLogging->action) ?></td>
                <td><?= h($intrasysLogging->entity) ?></td>
                <td><?= $this->Number->format($intrasysLogging->entityid) ?></td>
                <td><?= $this->Number->format($intrasysLogging->employeeid) ?></td>
                <td><?= h($intrasysLogging->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $intrasysLogging->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $intrasysLogging->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $intrasysLogging->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysLogging->id)]) ?>
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
