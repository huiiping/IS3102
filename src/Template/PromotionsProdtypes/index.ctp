<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Promotions Prodtype'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prodtypes'), ['controller' => 'Prodtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prodtype'), ['controller' => 'Prodtypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="promotionsProdtypes index large-9 medium-8 columns content">
    <h3><?= __('Promotions Prodtypes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('promotion_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prodtype_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($promotionsProdtypes as $promotionsProdtype): ?>
            <tr>
                <td><?= $promotionsProdtype->has('promotion') ? $this->Html->link($promotionsProdtype->promotion->id, ['controller' => 'Promotions', 'action' => 'view', $promotionsProdtype->promotion->id]) : '' ?></td>
                <td><?= $promotionsProdtype->has('prodtype') ? $this->Html->link($promotionsProdtype->prodtype->id, ['controller' => 'Prodtypes', 'action' => 'view', $promotionsProdtype->prodtype->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $promotionsProdtype->promotion_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $promotionsProdtype->promotion_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $promotionsProdtype->promotion_id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotionsProdtype->promotion_id)]) ?>
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
