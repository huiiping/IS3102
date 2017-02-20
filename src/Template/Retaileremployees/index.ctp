<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Element('retailerLeftSideBar'); ?>

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
              <h3 class="box-title"><?= __('Retailer Employees') ?></h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                        <!--<th scope="col"><?= $this->Paginator->sort('username') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('password') ?></th>-->
                        <!--<th scope="col"><?= $this->Paginator->sort('address') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('contact') ?></th>-->
                        <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('account_status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($retailerEmployees as $retailerEmployee): ?>
                    <tr>
                        <td><?= $this->Number->format($retailerEmployee->id) ?></td>
                        <!--<td><?= h($retailerEmployee->username) ?></td>
                        <td><?= h($retailerEmployee->password) ?></td>-->
                        <!--<td><?= h($retailerEmployee->address) ?></td>
                        <td><?= h($retailerEmployee->contact) ?></td>-->
                        <td><?= h($retailerEmployee->first_name) ?></td>
                        <td><?= h($retailerEmployee->last_name) ?></td>
                        <td><?= h($retailerEmployee->email) ?></td>
                        <td><?= h($retailerEmployee->account_status) ?></td>
                        <td><?= $retailerEmployee->has('location') ? $this->Html->link($retailerEmployee->location->name, ['controller' => 'Locations', 'action' => 'view', $retailerEmployee->location->id]) : '' ?></td>
                        <td><?= $this->Time->format(h($retailerEmployee->created), 'd MMM YYYY, hh:mm') ?></td>
                        <td><?= $this->Time->format(h($retailerEmployee->modified), 'd MMM YYYY, hh:mm') ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View | '), ['action' => 'view', $retailerEmployee->id]) ?>
                            <?= $this->Html->link(__('Edit | '), ['action' => 'edit', $retailerEmployee->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $retailerEmployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerEmployee->id)]) ?>
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
