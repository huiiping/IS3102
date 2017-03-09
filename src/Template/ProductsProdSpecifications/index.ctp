<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Products Prod Specification'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prod Specifications'), ['controller' => 'ProdSpecifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prod Specification'), ['controller' => 'ProdSpecifications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productsProdSpecifications index large-9 medium-8 columns content">
    <h3><?= __('Products Prod Specifications') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productsProdSpecifications as $productsProdSpecification): ?>
            <tr>
                <td><?= $productsProdSpecification->has('product') ? $this->Html->link($productsProdSpecification->product->id, ['controller' => 'Products', 'action' => 'view', $productsProdSpecification->product->id]) : '' ?></td>
                <td><?= h($productsProdSpecification->title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productsProdSpecification->product_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productsProdSpecification->product_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productsProdSpecification->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsProdSpecification->product_id)]) ?>
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
