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
                ['action' => 'delete', $retaileracctype->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $retaileracctype->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Retaileracctypes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retailers'), ['controller' => 'Retailers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer'), ['controller' => 'Retailers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retaileracctypes form large-9 medium-8 columns content">
    <?= $this->Form->create($retaileracctype) ?>
    <fieldset>
        <legend><?= __('Edit Retaileracctype') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('numOfUsers');
            echo $this->Form->input('numOfWarehouses');
            echo $this->Form->input('numOfStores');
            echo $this->Form->input('numOfProdTypes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
