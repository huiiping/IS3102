<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Logging'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="loggings index large-9 medium-8 columns content">
    <h3><?= __('Loggings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('entity_num') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($loggings as $logging): ?>
            <tr>
                <td><?= $this->Number->format($logging->id) ?></td>
                <td><?= h($logging->type) ?></td>
                <td><?= $this->Number->format($logging->entity_num) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $logging->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $logging->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $logging->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logging->id)]) ?>
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
