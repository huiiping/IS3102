<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $prodCat->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $prodCat->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Prod Cats'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Prod Types'), ['controller' => 'ProdTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prod Type'), ['controller' => 'ProdTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prodCats form large-9 medium-8 columns content">
    <?= $this->Form->create($prodCat) ?>
    <fieldset>
        <legend><?= __('Edit Prod Cat') ?></legend>
        <?php
            echo $this->Form->input('cat_name');
            echo $this->Form->input('cat_desc');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
