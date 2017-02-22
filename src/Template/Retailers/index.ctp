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
              <h3 class="box-title"><?= __('Retailers') ?></h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('company_name') ?></th>
                        <!--<th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>-->
                        <th scope="col"><?= $this->Paginator->sort('account_status') ?></th>
                        <!--<th scope="col"><?= $this->Paginator->sort('payment_term') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('loyalty_points') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('address') ?></th>-->
                        <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                        <!--<th scope="col"><?= $this->Paginator->sort('contract_start_date') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('contract_end_date') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('retailer_account_type') ?></th>-->
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($retailers as $retailer): ?>
                    <tr>
                        <td><?= $this->Number->format($retailer->id) ?></td>
                        <td><?= h($retailer->company_name) ?></td>
                        <!--<td><?= h($retailer->first_name) ?></td>
                        <td><?= h($retailer->last_name) ?></td>-->
                        <td><?= h($retailer->account_status) ?></td>
                        <!--<td><?= h($retailer->payment_term) ?></td>
                        <td><?= $this->Number->format($retailer->loyalty_points) ?></td>
                        <td><?= h($retailer->username) ?></td>
                        <td><?= h($retailer->email) ?></td>
                        <td><?= h($retailer->password) ?></td>
                        <td><?= h($retailer->address) ?></td>-->
                        <td><?= h($retailer->contact) ?></td>
                        <!--<td><?= h($retailer->contract_start_date) ?></td>
                        <td><?= h($retailer->contract_end_date) ?></td>
                        <td>
                            <?= $retailer->has('retailer_acc_type') ? $this->Html->link($retailer->retailer_acc_type->name, ['controller' => 'RetailerAccTypes', 'action' => 'view', $retailer->retailer_acc_type->id]) : '' ?>
                        </td>-->
                        <td><?= $this->Time->format(h($retailer->created), 'd MMM YYYY, hh:mm') ?></td>
                        <td><?= $this->Time->format(h($retailer->modified), 'd MMM YYYY, hh:mm') ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View | '), ['action' => 'view', $retailer->id]) ?>
                            <?= $this->Html->link(__('Edit | '), ['action' => 'edit', $retailer->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $retailer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailer->id)]) ?>
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