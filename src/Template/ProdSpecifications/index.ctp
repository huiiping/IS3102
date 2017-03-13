<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Prod Specification'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prodSpecifications index large-9 medium-8 columns content">

    <br>
    <!--<legend><h4><?= __('Search') ?></h4></legend>-->
    <table cellpadding="0" cellspacing="0", bgcolor="#FFFFFF">
        <tr><?php
            echo $this->Form->create($prodSpecifications);?>
            <th width="10"></th>
            <th scope="col"><?= $this->Form->input(('search'), ['label' => 'Search', 'type' => 'search']); ?></th>
            <th width="10"></th>

            <th scope="col" class="actions"><?= $this->Form->submit(__('Search'), ['class'=>'btn btn-default btn-flat']); ?></th>
            <th width="10"></th>
            <?php echo $this->Form->end();?>
        </tr>
    </table>
    <br>
    <h3><?= __('Prod Specifications') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prodSpecifications as $prodSpecification): ?>
            <tr>
                <td><?= h($prodSpecification->title) ?></td>
                <td><?= h($prodSpecification->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $prodSpecification->title]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $prodSpecification->title]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prodSpecification->title], ['confirm' => __('Are you sure you want to delete # {0}?', $prodSpecification->title)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
