<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Productcategory'), ['action' => 'edit', $productcategory->productCatId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Productcategory'), ['action' => 'delete', $productcategory->productCatId], ['confirm' => __('Are you sure you want to delete # {0}?', $productcategory->productCatId)]) ?> </li>
        <li><?= $this->Html->link(__('List Productcategory'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Productcategory'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productcategory view large-9 medium-8 columns content">
    <h3><?= h($productcategory->productCatId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ProductName') ?></th>
            <td><?= h($productcategory->productName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProductCatId') ?></th>
            <td><?= $this->Number->format($productcategory->productCatId) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('ProductDesc') ?></h4>
        <?= $this->Text->autoParagraph(h($productcategory->productDesc)); ?>
    </div>
</div>
