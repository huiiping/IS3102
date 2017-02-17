<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <?= $this->Element('sideBar', array('type' => 'Account Type', 'typePlural' => 'Account types')); ?>
</nav>
<div class="retaileracctypes form large-9 medium-8 columns content">
    <?= $this->Form->create($retaileracctype) ?>
    <fieldset>
        <legend><?= __('Add Retaileracctype') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('numOfUsers');
            echo $this->Form->input('numOfWarehouses');
            echo $this->Form->input('numOfStores');
            echo $this->Form->input('numOfProdTypes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
