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
    </ul>
</nav>
<div class="prodCats view large-9 medium-8 columns content">
    <h3><?= h($prodCat->cat_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cat Name') ?></th>
            <td><?= h($prodCat->cat_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($prodCat->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parentid') ?></th>
            <td><?= $this->Number->format($prodCat->parentid) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Cat Desc') ?></h4>
        <?= $this->Text->autoParagraph(h($prodCat->cat_desc)); ?>
    </div>
</div>
