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
              <h3 class="box-title"><?= __('Membership Points') ?></h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('pts') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('remarks') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($membershipPoints as $membershipPoint): ?>
                    <tr>
                        <td><?= $this->Number->format($membershipPoint->id) ?></td>
                        <td><?= $membershipPoint->has('customer') ? $this->Html->link($membershipPoint->customer->id, ['controller' => 'Customers', 'action' => 'view', $membershipPoint->customer->id]) : '' ?></td>
                        <td><?= $this->Number->format($membershipPoint->pts) ?></td>
                        <td><?= h($membershipPoint->type) ?></td>
                        <td><?= h($membershipPoint->remarks) ?></td>
                        <td><?= h($membershipPoint->created) ?></td>
                        <td><?= $membershipPoint->has('retailer_employee') ? $this->Html->link($membershipPoint->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $membershipPoint->retailer_employee->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $membershipPoint->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $membershipPoint->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $membershipPoint->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membershipPoint->id)]) ?>
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
