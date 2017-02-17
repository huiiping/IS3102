<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
   <?= $this->Element('sideBar', array('type' => 'Employee', 'typePlural' => 'employees')); ?>
</nav>
<div class="intrasysemployees form large-9 medium-8 columns content">
    <?= $this->Form->create($intrasysemployee) ?>
    <fieldset>
        <legend><?= __('Edit Intrasysemployee') ?></legend>
        <?php
            echo $this->Form->input('firstName');
            echo $this->Form->input('lastName');
            echo $this->Form->input('accountStatus');
            echo $this->Form->input('username');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('address');
            echo $this->Form->input('contact');
            echo $this->Form->input('intrasysemployeeroles._ids', ['options' => $intrasysemployeeroles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
