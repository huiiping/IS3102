<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Element('intrasysLeftSideBar'); ?>

<!-- Main Content -->
<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
  </section>
  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Intrasys Employee Roles') ?></h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                      <th scope="col"><?= $this->Paginator->sort(('id'), ['label' => 'ID']) ?></th>
                      <th scope="col"><?= $this->Paginator->sort('role_name') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                      <th scope="col" class="actions"><?= __('Actions') ?></th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($intrasysEmployeeRoles as $intrasysEmployeeRole): ?>
                  <tr>
                      <td><?= $this->Number->format($intrasysEmployeeRole->id) ?></td>
                      <td><?= h($intrasysEmployeeRole->role_name) ?></td>
                      <td><?= $this->Time->format(h($intrasysEmployeeRole->created), 'd MMM YYYY, hh:mm') ?></td>
                      <td><?= $this->Time->format(h($intrasysEmployeeRole->modified), 'd MMM YYYY, hh:mm') ?></td>
                      <td class="actions">
                          <?= $this->Html->link(__('View'), ['action' => 'view', $intrasysEmployeeRole->id]) ?>
                          <!--<?= $this->Html->link(__('Edit'), ['action' => 'edit', $intrasysEmployeeRole->id]) ?>
                          <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $intrasysEmployeeRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysEmployeeRole->id)]) ?>-->
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
          </div>
        </div>
      </div>
  </section>
</div>