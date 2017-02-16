<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Incidentreport'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="incidentreports index large-9 medium-8 columns content">
    <h3><?= __('Incidentreports') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dateCreated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($incidentreports as $incidentreport): ?>
            <tr>
                <td><?= $this->Number->format($incidentreport->id) ?></td>
                <td><?= h($incidentreport->title) ?></td>
                <td><?= h($incidentreport->dateCreated) ?></td>
                <td><?= h($incidentreport->status) ?></td>
                <td><?= $this->Number->format($incidentreport->reference_id) ?></td>
                <td><?= $incidentreport->has('retaileremployee') ? $this->Html->link($incidentreport->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $incidentreport->retaileremployee->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $incidentreport->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $incidentreport->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $incidentreport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $incidentreport->id)]) ?>
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
