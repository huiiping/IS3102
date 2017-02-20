<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Prod Cat'), ['action' => 'edit', $prodCat->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Prod Cat'), ['action' => 'delete', $prodCat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prodCat->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Prod Cats'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prod Cat'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prod Types'), ['controller' => 'ProdTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prod Type'), ['controller' => 'ProdTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="prodCats view large-9 medium-8 columns content">
    <h3><?= h($prodCat->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cat Name') ?></th>
            <td><?= h($prodCat->cat_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($prodCat->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Cat Desc') ?></h4>
        <?= $this->Text->autoParagraph(h($prodCat->cat_desc)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Prod Types') ?></h4>
        <?php if (!empty($prodCat->prod_types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Prod Name') ?></th>
                <th scope="col"><?= __('Prod Desc') ?></th>
                <th scope="col"><?= __('Colour') ?></th>
                <th scope="col"><?= __('Dimension') ?></th>
                <th scope="col"><?= __('Store Unit Price') ?></th>
                <th scope="col"><?= __('Web Store Unit Price') ?></th>
                <th scope="col"><?= __('SKU') ?></th>
                <th scope="col"><?= __('Prod Cat Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($prodCat->prod_types as $prodTypes): ?>
            <tr>
                <td><?= h($prodTypes->id) ?></td>
                <td><?= h($prodTypes->prod_name) ?></td>
                <td><?= h($prodTypes->prod_desc) ?></td>
                <td><?= h($prodTypes->colour) ?></td>
                <td><?= h($prodTypes->dimension) ?></td>
                <td><?= h($prodTypes->store_unit_price) ?></td>
                <td><?= h($prodTypes->web_store_unit_price) ?></td>
                <td><?= h($prodTypes->SKU) ?></td>
                <td><?= h($prodTypes->prod_cat_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProdTypes', 'action' => 'view', $prodTypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProdTypes', 'action' => 'edit', $prodTypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProdTypes', 'action' => 'delete', $prodTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prodTypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
