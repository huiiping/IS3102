<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Retailers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retaileracctypes'), ['controller' => 'Retaileracctypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileracctype'), ['controller' => 'Retaileracctypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retailers form large-9 medium-8 columns content">
    <?= $this->Form->create($retailer) ?>
    <fieldset>
        <legend><?= __('Add Retailer') ?></legend>
        <?php
            echo $this->Form->input('company_name');
            echo $this->Form->input('company_desc');
            echo $this->Form->input('last_name');
            echo $this->Form->input('activation_status');
            echo $this->Form->input('payment_term');
            echo $this->Form->input('loyalty_points');
            echo $this->Form->input('username');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('address');
            echo $this->Form->input('contact');
            echo $this->Form->input('contractStartDate');
            echo $this->Form->input('contractEndDate');
            echo $this->Form->input('retaileracctype_id', ['options' => $retaileracctypes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
