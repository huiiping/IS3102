<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Inventory'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prod Types'), ['controller' => 'ProdTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prod Type'), ['controller' => 'ProdTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="inventory index large-9 medium-8 columns content">

    <br>
    <!--<legend><h4><?= __('Search') ?></h4></legend>-->
    <table cellpadding="0" cellspacing="0", bgcolor="#FFFFFF">
        <tr><?php
            echo $this->Form->create($inventory);?>
            <th width="10"></th>
            <th scope="col"><?= $this->Form->input(('prod_type_id'), ['label' => 'Product Type Name', 'type' => 'search']); ?></th>
            <th width="10"></th>
            <th scope="col"><?= $this->Form->input(('section_id'), ['label' => 'Section Name', 'type' => 'search']); ?></th>
            <th width="10"></th>
            <th scope="col"><?= $this->Form->input(('location_id'), ['label' => 'Location Name', 'type' => 'search']); ?></th>
            <th width="10"></th>
            <th scope="col"><?= $this->Form->input(('SKU'), ['label' => 'SKU', 'type' => 'search']); ?></th>
            <th width="10"></th>


            <th scope="col" class="actions"><?= $this->Form->submit(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?></th>
            <th width="10"></th>
            <?php echo $this->Form->end();?>
        </tr>
    </table>
    <br>




    <h3><?= __('Inventory') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prod_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('SKU') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('section_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inventory as $inventory): ?>
            <tr>
                <td><?= $this->Number->format($inventory->id) ?></td>
                <td><?= $inventory->has('prod_type') ? $this->Html->link($inventory->prod_type->prod_name, ['controller' => 'ProdTypes', 'action' => 'view', $inventory->prod_type->id]) : '' ?></td>
                <td><?= h($inventory->SKU) ?></td>
                <td><?= $this->Number->format($inventory->quantity) ?></td>
                <td><?= $inventory->has('section') ? $this->Html->link($inventory->section->sec_name, ['controller' => 'Sections', 'action' => 'view', $inventory->section->id]) : '' ?></td>
                <td><?= $inventory->has('location') ? $this->Html->link($inventory->location->name, ['controller' => 'Locations', 'action' => 'view', $inventory->location->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $inventory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $inventory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inventory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->id)]) ?>
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
