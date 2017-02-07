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
                ['action' => 'delete', $retailer->retailerId],
                ['confirm' => __('Are you sure you want to delete # {0}?', $retailer->retailerId)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Retailer'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="retailer form large-9 medium-8 columns content">
    <?= $this->Form->create($retailer) ?>
    <fieldset>
        <legend><?= __('Edit Retailer') ?></legend>
        <?php
            echo $this->Form->input('retailerName');
            echo $this->Form->input('country');
            echo $this->Form->input('activationStatus');
            echo $this->Form->input('accountType');
            echo $this->Form->input('paymentType');
            echo $this->Form->input('loyaltyPoints');
            echo $this->Form->input('contractStartDate');
            echo $this->Form->input('contractEndDate');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
