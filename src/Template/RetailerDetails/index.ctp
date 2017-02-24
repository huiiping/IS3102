<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Retailer Detail'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retailerDetails index large-9 medium-8 columns content">
    <h3><?= __('Retailer Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('retailerid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailer_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailer_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($retailerDetails as $retailerDetail): ?>
            <tr>
                <td><?= $this->Number->format($retailerDetail->retailerid) ?></td>
                <td><?= h($retailerDetail->retailer_name) ?></td>
                <td><?= h($retailerDetail->retailer_email) ?></td>
                <td><?= h($retailerDetail->address) ?></td>
                <td><?= h($retailerDetail->contact) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $retailerDetail->retailerid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $retailerDetail->retailerid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $retailerDetail->retailerid], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerDetail->retailerid)]) ?>
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
