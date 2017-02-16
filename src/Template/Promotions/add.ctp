<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Prod Cats'), ['controller' => 'Prodcats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prod Cat'), ['controller' => 'Prodcats', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transferorderitems'), ['controller' => 'Transferorderitems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transferorderitem'), ['controller' => 'Transferorderitems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="promotions form large-9 medium-8 columns content">
    <?= $this->Form->create($promotion) ?>
    <fieldset>
        <legend><?= __('Add Promotion') ?></legend>
        <?php
            echo $this->Form->input('startDate', ['empty' => true]);
            echo $this->Form->input('endDate', ['empty' => true]);
            echo $this->Form->input('promoDesc');
            echo $this->Form->input('item1_id');
            echo $this->Form->input('item2_id');
            echo $this->Form->input('prodType1_id');
            echo $this->Form->input('prodType2_id');
            echo $this->Form->input('firstVouherNo');
            echo $this->Form->input('lastVoucherNo');
            echo $this->Form->input('discountRate');
            echo $this->Form->input('creditCardType');
            echo $this->Form->input('prodCat_id', ['options' => $prodCats, 'empty' => true]);
            echo $this->Form->input('employee_id', ['options' => $retaileremployees, 'empty' => true]);
            echo $this->Form->input('locations._ids', ['options' => $locations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
