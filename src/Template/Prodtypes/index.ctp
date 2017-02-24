<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Prod Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prod Cats'), ['controller' => 'ProdCats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prod Cat'), ['controller' => 'ProdCats', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="locations index large-9 medium-8 columns content">
    <h3><?= __('Search') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr><?php
            echo $this->Form->create(null);?>
            <th scope="col"><?= $this->Form->input('prod_name'); ?></th>
            <th scope="col"><?= $this->Form->input('prod_desc'); ?></th>

            <th scope="col"><?= $this->Form->input('colour'); ?></th>
        </tr><tr>
            <th scope="col"><?= $this->Form->input('SKU'); ?></th>

            <th scope="col"><?= $this->Form->input('store_unit_price'); ?></th>
            <th scope="col"><?= $this->Form->input('web_store_unit_price'); ?></th>


            <th scope="col" class="actions"><?= $this->Form->submit(__('Submit')); ?></th>
            <?php echo $this->Form->end();?>
        </tr>

        </thead>
    </table>

    <h3><?= __('Prod Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prod_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('colour') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dimension') ?></th>
                <th scope="col"><?= $this->Paginator->sort('store_unit_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('web_store_unit_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('SKU') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prod_cat_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prodTypes as $prodType): ?>
            <tr>
                <td><?= $this->Number->format($prodType->id) ?></td>
                <td><?= h($prodType->prod_name) ?></td>
                <td><?= h($prodType->colour) ?></td>
                <td><?= h($prodType->dimension) ?></td>
                <td><?= $this->Number->format($prodType->store_unit_price) ?></td>
                <td><?= $this->Number->format($prodType->web_store_unit_price) ?></td>
                <td><?= h($prodType->SKU) ?></td>
                <td><?= $prodType->has('prod_cat') ? $this->Html->link($prodType->prod_cat->id, ['controller' => 'ProdCats', 'action' => 'view', $prodType->prod_cat->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $prodType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $prodType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prodType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prodType->id)]) ?>
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
