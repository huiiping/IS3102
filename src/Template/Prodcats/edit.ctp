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
                ['action' => 'delete', $prodcat->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $prodcat->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Prodcats'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="prodcats form large-9 medium-8 columns content">
    <?= $this->Form->create($prodcat) ?>
    <fieldset>
        <legend><?= __('Edit Prodcat') ?></legend>
        <?php
            echo $this->Form->input('catName');
            echo $this->Form->input('catDesc');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
