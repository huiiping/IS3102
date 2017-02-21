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
              <h3 class="box-title"><?= __('Intrasys Employees') ?></h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                      <th scope="col"><?= $this->Paginator->sort(('id'), ['label' => 'ID']) ?></th>
                      <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('account_status') ?></th>
                      <!--<th scope="col"><?= $this->Paginator->sort('username') ?></th>-->
                      <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                      <!--<th scope="col"><?= $this->Paginator->sort('password') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('contact') ?></th>-->
                      <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                      <th scope="col" class="actions"><?= __('Actions') ?></th>
                  </tr>
              </thead>
                <tbody>
                  <?php foreach ($intrasysEmployees as $intrasysEmployee): ?>
            <tr>
                <td><?= $this->Number->format($intrasysEmployee->id) ?></td>
                <td><?= h($intrasysEmployee->first_name) ?></td>
                <td><?= h($intrasysEmployee->last_name) ?></td>
                <td><?= h($intrasysEmployee->account_status) ?></td>
                <!--<td><?= h($intrasysEmployee->username) ?></td>-->
                <td><?= h($intrasysEmployee->email) ?></td>
                <!--<td><?= h($intrasysEmployee->password) ?></td>
                <td><?= h($intrasysEmployee->address) ?></td>
                <td><?= h($intrasysEmployee->contact) ?></td>-->
                <td><?= $this->Time->format(h($intrasysEmployee->created), 'd MMM YYYY, hh:mm') ?></td>
                <td><?= $this->Time->format(h($intrasysEmployee->modified), 'd MMM YYYY, hh:mm') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View | '), ['action' => 'view', $intrasysEmployee->id]) ?>
                    <?= $this->Html->link(__('Edit | '), ['action' => 'edit', $intrasysEmployee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $intrasysEmployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysEmployee->id)]) ?>
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
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
