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
                ['action' => 'delete', $promotionsProdtype->promotion_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $promotionsProdtype->promotion_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Promotions Prodtypes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prodtypes'), ['controller' => 'Prodtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prodtype'), ['controller' => 'Prodtypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="promotionsProdtypes form large-9 medium-8 columns content">
    <?= $this->Form->create($promotionsProdtype) ?>
    <fieldset>
        <legend><?= __('Edit Promotions Prodtype') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
