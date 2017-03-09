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
                ['action' => 'delete', $prodSpecification->title],
                ['confirm' => __('Are you sure you want to delete # {0}?', $prodSpecification->title)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Prod Specifications'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prodSpecifications form large-9 medium-8 columns content">
    <?= $this->Form->create($prodSpecification) ?>
    <fieldset>
        <legend><?= __('Edit Prod Specification') ?></legend>
        <?php
            echo $this->Form->input('description');
            echo $this->Form->input('products._ids', ['options' => $products]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
