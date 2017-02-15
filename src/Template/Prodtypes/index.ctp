<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Prodtype'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prodcats'), ['controller' => 'Prodcats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prodcat'), ['controller' => 'Prodcats', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prodtypes index large-9 medium-8 columns content">
    <h3><?= __('Prodtypes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prodName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('colour') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dimension') ?></th>
                <th scope="col"><?= $this->Paginator->sort('storeUnitPrice') ?></th>
                <th scope="col"><?= $this->Paginator->sort('webStoreUnitPrice') ?></th>
                <th scope="col"><?= $this->Paginator->sort('SKU') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prodCat_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prodtypes as $prodtype): ?>
            <tr>
                <td><?= $this->Number->format($prodtype->id) ?></td>
                <td><?= h($prodtype->prodName) ?></td>
                <td><?= h($prodtype->colour) ?></td>
                <td><?= h($prodtype->dimension) ?></td>
                <td><?= $this->Number->format($prodtype->storeUnitPrice) ?></td>
                <td><?= $this->Number->format($prodtype->webStoreUnitPrice) ?></td>
                <td><?= h($prodtype->SKU) ?></td>
                <td><?= $prodtype->has('retaileremployee') ? $this->Html->link($prodtype->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $prodtype->retaileremployee->id]) : '' ?></td>
                <td><?= $prodtype->has('prodcat') ? $this->Html->link($prodtype->prodcat->id, ['controller' => 'Prodcats', 'action' => 'view', $prodtype->prodcat->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $prodtype->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $prodtype->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prodtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prodtype->id)]) ?>
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
