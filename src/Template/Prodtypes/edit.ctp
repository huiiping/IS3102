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
                ['action' => 'delete', $prodtype->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $prodtype->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Prodtypes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prodcats'), ['controller' => 'Prodcats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prodcat'), ['controller' => 'Prodcats', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prodtypes form large-9 medium-8 columns content">
    <?= $this->Form->create($prodtype) ?>
    <fieldset>
        <legend><?= __('Edit Prodtype') ?></legend>
        <?php
            echo $this->Form->input('prodName');
            echo $this->Form->input('prodDesc');
            echo $this->Form->input('colour');
            echo $this->Form->input('dimension');
            echo $this->Form->input('storeUnitPrice');
            echo $this->Form->input('webStoreUnitPrice');
            echo $this->Form->input('SKU');
            echo $this->Form->input('employee_id', ['options' => $retaileremployees, 'empty' => true]);
            echo $this->Form->input('prodCat_id', ['options' => $prodcats, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
