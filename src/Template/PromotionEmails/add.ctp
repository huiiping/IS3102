<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
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
        <legend><?= __('Add Promotion Email') ?></legend>
        <?php
            echo $this->Form->input('promotion_id', ['options' => $promotions, 'empty' => false]);
            echo $this->Form->input('cust_membership_tier_id', [
                'options' => $custMembershipTiers, 
                'type' => 'select',
                'multiple' => true,
                'empty' => false,
                'label' => 'Customer Membership Tier'
                ]);
            echo $this->Form->input('title');
            echo $this->Form->input('body', [
                'type' => 'textarea']);
            //echo $this->Form->input('last_sent', ['empty' => true]);
            //echo $this->Form->input('number_of_sends');
            echo "<br /><b>Send email now?</b> ";
            echo "&nbsp;&nbsp;&nbsp;";
            echo $this->Form->radio('email', 
                [
                    ['value' => 'y', 'text' => ' Yes '],
                    ['value' => 'n', 'text' => ' No '],
                ]
            );
            echo $this->Form->hidden('last_sent', ['value' => null]);
            echo $this->Form->hidden('number_of_sends', ['value' => '0']);
            echo "<br />";
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
