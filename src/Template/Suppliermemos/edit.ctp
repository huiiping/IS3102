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
                ['action' => 'delete', $supplierMemo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $supplierMemo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Supplier Memos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="supplierMemos form large-9 medium-8 columns content">
    <?= $this->Form->create($supplierMemo) ?>
    <fieldset>
        <legend><?= __('Edit Supplier Memo') ?></legend>
        <?php
            echo $this->Form->input('remarks');
            echo $this->Form->input('supplier_id', ['options' => $suppliers, 'empty' => true]);
            echo $this->Form->input('retailer_employee_id', ['options' => $retailerEmployees, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
