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
                ['action' => 'delete', $rfqsSupplier->rfq_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rfqsSupplier->rfq_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rfqs Suppliers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rfqs'), ['controller' => 'Rfqs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rfq'), ['controller' => 'Rfqs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rfqsSuppliers form large-9 medium-8 columns content">
    <?= $this->Form->create($rfqsSupplier) ?>
    <fieldset>
        <legend><?= __('Edit Rfqs Supplier') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
