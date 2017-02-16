<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Prodtypes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Prodcats'), ['controller' => 'Prodcats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prodcat'), ['controller' => 'Prodcats', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prodtypes form large-9 medium-8 columns content">
    <?= $this->Form->create($prodtype) ?>
    <fieldset>
        <legend><?= __('Add Prodtype') ?></legend>
        <?php
            echo $this->Form->input('prodName');
            echo $this->Form->input('prodDesc');
            echo $this->Form->input('colour');
            echo $this->Form->input('dimension');
            echo $this->Form->input('storeUnitPrice');
            echo $this->Form->input('webStoreUnitPrice');
            echo $this->Form->input('SKU');
            echo $this->Form->input('prodCat_id', ['options' => $prodcats, 'empty' => true]);
            echo $this->Form->input('promotions._ids', ['options' => $promotions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
