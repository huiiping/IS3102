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
                ['action' => 'delete', $accounttype->accountId],
                ['confirm' => __('Are you sure you want to delete # {0}?', $accounttype->accountId)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Accounttype'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="accounttype form large-9 medium-8 columns content">
    <?= $this->Form->create($accounttype) ?>
    <fieldset>
        <legend><?= __('Edit Accounttype') ?></legend>
        <?php
            echo $this->Form->input('accountTypeName');
            echo $this->Form->input('numOfUsers');
            echo $this->Form->input('numOfWarehouses');
            echo $this->Form->input('numOfStores');
            echo $this->Form->input('numOfProductTypes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
