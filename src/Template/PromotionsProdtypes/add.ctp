<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Promotions Prod Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prod Types'), ['controller' => 'ProdTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prod Type'), ['controller' => 'ProdTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="promotionsProdTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($promotionsProdType) ?>
    <fieldset>
        <legend><?= __('Add Promotions Prod Type') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
