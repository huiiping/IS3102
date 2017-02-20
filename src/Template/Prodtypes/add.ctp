<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Prod Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Prod Cats'), ['controller' => 'ProdCats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prod Cat'), ['controller' => 'ProdCats', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prodTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($prodType) ?>
    <fieldset>
        <legend><?= __('Add Prod Type') ?></legend>
        <?php
            echo $this->Form->input('prod_name');
            echo $this->Form->input('prod_desc');
            echo $this->Form->input('colour');
            echo $this->Form->input('dimension');
            echo $this->Form->input('store_unit_price');
            echo $this->Form->input('web_store_unit_price');
            echo $this->Form->input('SKU');
            echo $this->Form->input('prod_cat_id', ['options' => $prodCats, 'empty' => true]);
            echo $this->Form->input('promotions._ids', ['options' => $promotions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
