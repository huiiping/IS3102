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
                ['action' => 'delete', $account->userId],
                ['confirm' => __('Are you sure you want to delete # {0}?', $account->userId)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Account'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="account form large-9 medium-8 columns content">
    <?= $this->Form->create($account) ?>
    <fieldset>
        <legend><?= __('Edit Account') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('email');
            echo $this->Form->input('address');
            echo $this->Form->input('phone');
            echo $this->Form->input('dateJoined');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
