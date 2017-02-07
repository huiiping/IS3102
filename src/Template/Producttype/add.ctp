<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Producttype'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="producttype form large-9 medium-8 columns content">
    <?= $this->Form->create($producttype) ?>
    <fieldset>
        <legend><?= __('Add Producttype') ?></legend>
        <?php
            echo $this->Form->input('productTypeName');
            echo $this->Form->input('productTypeDesc');
            echo $this->Form->input('colour');
            echo $this->Form->input('dimension');
            echo $this->Form->input('storePrice');
            echo $this->Form->input('webstorePrice');
            echo $this->Form->input('SKU');
            echo $this->Form->input('locationId');
            echo $this->Form->input('productCategoryId');
            echo $this->Form->input('column_11');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
