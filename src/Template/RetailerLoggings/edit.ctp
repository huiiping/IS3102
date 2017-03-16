<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?php if($intrasys) : ?>
    <?= $this->Element('intrasysLeftSideBar'); ?>
    <? $this->assign('title', __('Log') . '/' . __('Index')); ?>
    <? $this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']); ?>
    <? $this->Html->addCrumb(__('Logs')); ?>
<?php else : ?>
    <?= $this->Element('retailerLeftSideBar'); ?>
    <? $this->assign('title', __('Log') . '/' . __('Edit')); ?>
    <? $this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']); ?>
    <? $this->Html->addCrumb(__('Employee'), ['controller' => 'RetailerEmployees', 'action' => 'index']);?>
    <? $this->Html->addCrumb(__('Logs'),['controller' => 'RetailerLoggings', 'action' => 'index']);?>
    <? $this->Html->addCrumb(__('Edit'));?>
<?php endif; ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $retailerLogging->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $retailerLogging->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Retailer Loggings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="retailerLoggings form large-9 medium-8 columns content">
    <?= $this->Form->create($retailerLogging) ?>
    <fieldset>
        <legend><?= __('Edit Retailer Logging') ?></legend>
        <?php
            echo $this->Form->input('action');
            echo $this->Form->input('entity');
            echo $this->Form->input('entityid');
            echo $this->Form->input('retailer_employee_id', ['options' => $retailerEmployees]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
