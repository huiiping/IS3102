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
                ['action' => 'delete', $retailer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $retailer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Retailers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Acc Types'), ['controller' => 'RetailerAccTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Acc Type'), ['controller' => 'RetailerAccTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retailers form large-9 medium-8 columns content">
    <?= $this->Form->create($retailer) ?>
    <fieldset>
        <legend><?= __('Edit Retailer') ?></legend>
        <?php
            echo $this->Form->input('company_name');
            echo $this->Form->input('company_desc');
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('account_status');
            echo $this->Form->input('payment_term');
            echo $this->Form->input('loyalty_points');
            echo $this->Form->input('username');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('address');
            echo $this->Form->input('contact');
            echo $this->Form->input('contract_start_date');
            echo $this->Form->input('contract_end_date');
            echo $this->Form->input('retailer_acc_type_id', ['options' => $retailerAccTypes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
