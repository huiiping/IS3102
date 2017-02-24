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
        <legend><?= __('Add Membership Tier') ?></legend>
        <?php
            echo $this->Form->input('tier_name', array('label' => 'Name'));
            echo $this->Form->input('validity_period', array('label' => 'Renewal Cycle (days)'));
            echo $this->Form->input('min_spending', array('label' => 'Minimum Spending'));
            echo $this->Form->input('membership_fee', array('label' => 'Membership Fee'));
            echo $this->Form->input('membership_pts', array('label' => 'Membership Points Earned Per $1 Spent'));
            echo $this->Form->input('redemption_pts', array('label' => 'Redemption Points Exchange Rate For $1 Discount'));
            echo $this->Form->input('discount_rate', array('label' => 'Discount Rate (%)'));
            echo $this->Form->input('birthday_rate', array('label' => 'Birthday Discount Rate (%)'));
            echo $this->Form->input('description');
        ?>
    <br />
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
