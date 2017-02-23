<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Retailer Loyalty Points'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retailers'), ['controller' => 'Retailers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer'), ['controller' => 'Retailers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retailerLoyaltyPoints form large-9 medium-8 columns content">
    <?= $this->Form->create($retailerLoyaltyPoint) ?>
    <fieldset>
        <legend><?= __('Add Retailer Loyalty Point') ?></legend>
        <?php
            echo $this->Form->input('loyalty_pts');
            echo $this->Form->input('redemption_pts');
            echo $this->Form->input('remarks');
            echo $this->Form->input('retailer_id', ['options' => $retailers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
