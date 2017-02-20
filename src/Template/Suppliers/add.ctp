<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Purchase Orders'), ['controller' => 'PurchaseOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchase Order'), ['controller' => 'PurchaseOrders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Supplier Memos'), ['controller' => 'SupplierMemos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier Memo'), ['controller' => 'SupplierMemos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="suppliers form large-9 medium-8 columns content">
    <?= $this->Form->create($supplier) ?>
    <fieldset>
        <legend><?= __('Add Supplier') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('email');
            echo $this->Form->input('address');
            echo $this->Form->input('contact');
            echo $this->Form->input('supplier_name');
            echo $this->Form->input('country');
            echo $this->Form->input('account_status');
            echo $this->Form->input('bank_acc');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
