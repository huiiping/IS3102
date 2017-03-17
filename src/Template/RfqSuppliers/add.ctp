<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Rfq Suppliers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rfqs'), ['controller' => 'Rfqs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rfq'), ['controller' => 'Rfqs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rfqSuppliers form large-9 medium-8 columns content">
    <?= $this->Form->create($rfqSupplier) ?>
    <fieldset>
        <legend><?= __('Add Rfq Supplier') ?></legend>
        <?php
            echo $this->Form->control('remarks');
            echo $this->Form->control('fileName');
            echo $this->Form->control('fileDir');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
