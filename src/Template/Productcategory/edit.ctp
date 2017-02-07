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
                ['action' => 'delete', $productcategory->productCatId],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productcategory->productCatId)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Productcategory'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="productcategory form large-9 medium-8 columns content">
    <?= $this->Form->create($productcategory) ?>
    <fieldset>
        <legend><?= __('Edit Productcategory') ?></legend>
        <?php
            echo $this->Form->input('productName');
            echo $this->Form->input('productDesc');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
