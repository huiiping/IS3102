<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Retailer'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retailer index large-9 medium-8 columns content">
    <h3><?= __('Retailer') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('retailerId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailerName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activationStatus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('accountType') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paymentType') ?></th>
                <th scope="col"><?= $this->Paginator->sort('loyaltyPoints') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contractStartDate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contractEndDate') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($retailer as $retailer): ?>
            <tr>
                <td><?= $this->Number->format($retailer->retailerId) ?></td>
                <td><?= h($retailer->retailerName) ?></td>
                <td><?= h($retailer->country) ?></td>
                <td><?= h($retailer->activationStatus) ?></td>
                <td><?= h($retailer->accountType) ?></td>
                <td><?= h($retailer->paymentType) ?></td>
                <td><?= $this->Number->format($retailer->loyaltyPoints) ?></td>
                <td><?= h($retailer->contractStartDate) ?></td>
                <td><?= h($retailer->contractEndDate) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $retailer->retailerId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $retailer->retailerId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $retailer->retailerId], ['confirm' => __('Are you sure you want to delete # {0}?', $retailer->retailerId)]) ?>
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
