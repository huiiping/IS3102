<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Products Prod Specification'), ['action' => 'edit', $productsProdSpecification->product_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Products Prod Specification'), ['action' => 'delete', $productsProdSpecification->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsProdSpecification->product_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products Prod Specifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Products Prod Specification'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prod Specifications'), ['controller' => 'ProdSpecifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prod Specification'), ['controller' => 'ProdSpecifications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productsProdSpecifications view large-9 medium-8 columns content">
    <h3><?= h($productsProdSpecification->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productsProdSpecification->has('product') ? $this->Html->link($productsProdSpecification->product->id, ['controller' => 'Products', 'action' => 'view', $productsProdSpecification->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($productsProdSpecification->title) ?></td>
        </tr>
    </table>
</div>
