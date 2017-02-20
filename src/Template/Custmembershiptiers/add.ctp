<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cust Membership Tiers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="custMembershipTiers form large-9 medium-8 columns content">
    <?= $this->Form->create($custMembershipTier) ?>
    <fieldset>
        <legend><?= __('Add Cust Membership Tier') ?></legend>
        <?php
            echo $this->Form->input('tier_name');
            echo $this->Form->input('validity_period');
            echo $this->Form->input('min_spending');
            echo $this->Form->input('membership_fee');
            echo $this->Form->input('membership_pts');
            echo $this->Form->input('redemption_pts');
            echo $this->Form->input('discount_rate');
            echo $this->Form->input('birthday_rate');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
