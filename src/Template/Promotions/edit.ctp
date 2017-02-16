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
                ['action' => 'delete', $promotion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $promotion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prodtypes'), ['controller' => 'Prodtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prodtype'), ['controller' => 'Prodtypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="promotions form large-9 medium-8 columns content">
    <?= $this->Form->create($promotion) ?>
    <fieldset>
        <legend><?= __('Edit Promotion') ?></legend>
        <?php
            echo $this->Form->input('startDate', ['empty' => true]);
            echo $this->Form->input('endDate', ['empty' => true]);
            echo $this->Form->input('promoDesc');
            echo $this->Form->input('firstVouherNo');
            echo $this->Form->input('lastVoucherNo');
            echo $this->Form->input('discountRate');
            echo $this->Form->input('creditCardType');
            echo $this->Form->input('retailerEmployee_id', ['options' => $retaileremployees, 'empty' => true]);
            echo $this->Form->input('customers._ids', ['options' => $customers]);
            echo $this->Form->input('prodtypes._ids', ['options' => $prodtypes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
