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
                ['action' => 'delete', $retailerInfo->retailer_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $retailerInfo->retailer_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Retailer Info'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retailers'), ['controller' => 'Retailers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer'), ['controller' => 'Retailers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retailerInfo form large-9 medium-8 columns content">
    <?= $this->Form->create($retailerInfo) ?>
    <fieldset>
        <legend><?= __('Edit Retailer Info') ?></legend>
        <?php
            echo $this->Form->input('retailer_name');
            echo $this->Form->input('retailer_desc');
            echo $this->Form->input('retailer_email');
            echo $this->Form->input('address');
            echo $this->Form->input('contact');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
