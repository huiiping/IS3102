<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Item'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="item form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Add Item') ?></legend>
        <?php
            echo $this->Form->input('itemDesc');
            echo $this->Form->input('EPC');
            echo $this->Form->input('barcode');
            echo $this->Form->input('itemStatus');
            echo $this->Form->input('isDefective');
            echo $this->Form->input('productCategoryId');
            echo $this->Form->input('productTypeId');
            echo $this->Form->input('locationId');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
