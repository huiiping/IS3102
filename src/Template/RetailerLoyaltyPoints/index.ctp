<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Retailer Loyalty Point'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailers'), ['controller' => 'Retailers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer'), ['controller' => 'Retailers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retailerLoyaltyPoints index large-9 medium-8 columns content">
    <h3><?= __('Retailer Loyalty Points') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('loyalty_pts') ?></th>
                <th scope="col"><?= $this->Paginator->sort('redemption_pts') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailer_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($retailerLoyaltyPoints as $retailerLoyaltyPoint): ?>
            <tr>
                <td><?= $this->Number->format($retailerLoyaltyPoint->id) ?></td>
                <td><?= $this->Number->format($retailerLoyaltyPoint->loyalty_pts) ?></td>
                <td><?= $this->Number->format($retailerLoyaltyPoint->redemption_pts) ?></td>
                <td><?= h($retailerLoyaltyPoint->created) ?></td>
                <td><?= h($retailerLoyaltyPoint->modified) ?></td>
                <td><?= $retailerLoyaltyPoint->has('retailer') ? $this->Html->link($retailerLoyaltyPoint->retailer->id, ['controller' => 'Retailers', 'action' => 'view', $retailerLoyaltyPoint->retailer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $retailerLoyaltyPoint->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $retailerLoyaltyPoint->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $retailerLoyaltyPoint->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerLoyaltyPoint->id)]) ?>
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
