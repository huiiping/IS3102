<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Retailer Details'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="retailerDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($retailerDetail) ?>
    <fieldset>
        <legend><?= __('Add Retailer Detail') ?></legend>
        <?php
            echo $this->Form->input('retailer_name');
            echo $this->Form->input('retailer_desc');
            echo $this->Form->input('retailer_email');
            echo $this->Form->input('address');
            echo $this->Form->input('contact');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
