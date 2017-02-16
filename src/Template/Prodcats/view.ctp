<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Prodcat'), ['action' => 'edit', $prodcat->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Prodcat'), ['action' => 'delete', $prodcat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prodcat->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Prodcats'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prodcat'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="prodcats view large-9 medium-8 columns content">
    <h3><?= h($prodcat->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('CatName') ?></th>
            <td><?= h($prodcat->catName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($prodcat->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('CatDesc') ?></h4>
        <?= $this->Text->autoParagraph(h($prodcat->catDesc)); ?>
    </div>
</div>
