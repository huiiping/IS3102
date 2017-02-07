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
                ['action' => 'delete', $location->locationId],
                ['confirm' => __('Are you sure you want to delete # {0}?', $location->locationId)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Location'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="location form large-9 medium-8 columns content">
    <?= $this->Form->create($location) ?>
    <fieldset>
        <legend><?= __('Edit Location') ?></legend>
        <?php
            echo $this->Form->input('locationName');
            echo $this->Form->input('address');
            echo $this->Form->input('contact');
            echo $this->Form->input('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
