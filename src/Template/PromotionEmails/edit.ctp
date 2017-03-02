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
                ['action' => 'delete', $promotionEmail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $promotionEmail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Promotion Emails'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cust Membership Tiers'), ['controller' => 'CustMembershipTiers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cust Membership Tier'), ['controller' => 'CustMembershipTiers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="promotionEmails form large-9 medium-8 columns content">
    <?= $this->Form->create($promotionEmail) ?>
    <fieldset>
        <legend><?= __('Edit Promotion Email') ?></legend>
        <?php
            echo $this->Form->input('promotion_id', ['options' => $promotions, 'empty' => true]);
            echo $this->Form->input('cust_membership_tier_id', ['options' => $custMembershipTiers, 'empty' => true]);
            echo $this->Form->input('title');
            echo $this->Form->input('body');
            echo $this->Form->input('last_sent', ['empty' => true]);
            echo $this->Form->input('number_of_sends');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
