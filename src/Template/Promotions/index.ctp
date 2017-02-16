<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prod Cats'), ['controller' => 'Prodcats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prod Cat'), ['controller' => 'Prodcats', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transferorderitems'), ['controller' => 'Transferorderitems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transferorderitem'), ['controller' => 'Transferorderitems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="promotions index large-9 medium-8 columns content">
    <h3><?= __('Promotions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('startDate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('endDate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item1_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item2_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prodType1_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prodType2_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('firstVouherNo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastVoucherNo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discountRate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creditCardType') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prodCat_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($promotions as $promotion): ?>
            <tr>
                <td><?= $this->Number->format($promotion->id) ?></td>
                <td><?= h($promotion->startDate) ?></td>
                <td><?= h($promotion->endDate) ?></td>
                <td><?= $this->Number->format($promotion->item1_id) ?></td>
                <td><?= $this->Number->format($promotion->item2_id) ?></td>
                <td><?= $this->Number->format($promotion->prodType1_id) ?></td>
                <td><?= $this->Number->format($promotion->prodType2_id) ?></td>
                <td><?= h($promotion->firstVouherNo) ?></td>
                <td><?= h($promotion->lastVoucherNo) ?></td>
                <td><?= $this->Number->format($promotion->discountRate) ?></td>
                <td><?= h($promotion->creditCardType) ?></td>
                <td><?= $promotion->has('prod_cat') ? $this->Html->link($promotion->prod_cat->id, ['controller' => 'Prodcats', 'action' => 'view', $promotion->prod_cat->id]) : '' ?></td>
                <td><?= $promotion->has('retaileremployee') ? $this->Html->link($promotion->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $promotion->retaileremployee->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $promotion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $promotion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $promotion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotion->id)]) ?>
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
