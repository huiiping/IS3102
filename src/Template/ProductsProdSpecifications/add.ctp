<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Products Prod Specifications'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prod Specifications'), ['controller' => 'ProdSpecifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prod Specification'), ['controller' => 'ProdSpecifications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productsProdSpecifications form large-9 medium-8 columns content">
    <?= $this->Form->create($productsProdSpecification) ?>
    <fieldset>
        <legend><?= __('Add Products Prod Specification') ?></legend>
        <?php
            echo $this->Form->input('prod_specification_title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
