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
        <li><?= $this->Html->link(__('List Retaileracctypes'), ['controller' => 'Retaileracctypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileracctype'), ['controller' => 'Retaileracctypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retailers form large-9 medium-8 columns content">
    <?= $this->Form->create($retailer) ?>
    <fieldset>
        <legend><?= __('Edit Retailer') ?></legend>
        <?php
            echo $this->Form->input('companyName');
            echo $this->Form->input('companyDesc');
            echo $this->Form->input('lastName');
            echo $this->Form->input('activationStatus');
            echo $this->Form->input('paymentTerm');
            echo $this->Form->input('loyaltyPoints');
            echo $this->Form->input('username');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('address');
            echo $this->Form->input('contact');
            echo $this->Form->input('contractStartDate');
            echo $this->Form->input('contractEndDate');
            echo $this->Form->input('retailerAccType_id', ['options' => $retaileracctypes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
