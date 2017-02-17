<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
    <!--<?= $this->Element('sideBar', array('type' => 'Role', 'typePlural' => 'roles')); ?>-->
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Role'), ['action' => 'index']) ?></li>
</nav>
<div class="intrasysemployeeroles index large-9 medium-8 columns content">
    <h3><?= __('Intrasys Employee Roles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Role Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Role Description') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>-->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($intrasysemployeeroles as $intrasysemployeerole): ?>
            <tr>
                <td><?= $this->Number->format($intrasysemployeerole->id) ?></td>
                <td><?= h($intrasysemployeerole->roleName) ?></td>
                <td><?= h($intrasysemployeerole->roleDesc) ?></td>                
                <!--<td><?= h($intrasysemployeerole->created) ?></td>
                <td><?= h($intrasysemployeerole->modified) ?></td>-->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $intrasysemployeerole->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $intrasysemployeerole->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $intrasysemployeerole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysemployeerole->id)]) ?>
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
