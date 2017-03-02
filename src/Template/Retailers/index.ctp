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
            <br>
              <table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                  <tr>
                    <?php echo $this->Form->create(null);?>
                      <th width="10"></th>
                      <th scope="col"><?= $this->Form->input('retailer_name'); ?></th>
                      <th width="60"></th>
                      <th scope="col"><?= $this->Form->input('account_status'); ?></th>
                      <th width="30"></th>
                      <th scope="col" class="actions"><?= $this->Form->submit(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?></th>
                      <th width="10"></th>
                      <?php echo $this->Form->end();?>
                  </tr>
              </table>

              <br>
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('retailer_name') ?></th>
                        <!--<th scope="col"><?= $this->Paginator->sort('account_status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('payment_term') ?></th>-->
                        <th scope="col"><?= $this->Paginator->sort('retailer_email') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('retailer_acc_type_id', ['label'=>'Retailer Account Type']) ?></th>
                        <!--<th scope="col"><?= $this->Paginator->sort('address') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('contract_start_date') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('contract_end_date') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('num_of_users') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('num_of_warehouses') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('num_of_stores') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('num_of_product_types') ?></th>-->
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($retailers as $retailer): ?>
                    <tr>
                        <td><?= $this->Number->format($retailer->id) ?></td>
                        <td><?= h($retailer->retailer_name) ?></td>
                        <!--<td><?= h($retailer->account_status) ?></td>
                        <td><?= h($retailer->payment_term) ?></td>-->
                        <td><?= h($retailer->retailer_email) ?></td>
                        <td><?= $retailer->has('retailer_acc_type') ? $this->Html->link($retailer->retailer_acc_type->name, ['controller' => 'RetailerAccTypes', 'action' => 'view', $retailer->retailer_acc_type->id]) : '' ?></td>
                        <!--<td><?= h($retailer->address) ?></td>
                        <td><?= h($retailer->contact) ?></td>
                        <td><?= h($retailer->contract_start_date) ?></td>
                        <td><?= h($retailer->contract_end_date) ?></td>
                        <td><?= $this->Number->format($retailer->num_of_users) ?></td>
                        <td><?= $this->Number->format($retailer->num_of_warehouses) ?></td>
                        <td><?= $this->Number->format($retailer->num_of_stores) ?></td>
                        <td><?= $this->Number->format($retailer->num_of_product_types) ?></td>-->
                        <td><?= $this->Time->format(h($retailer->created), 'd MMM YYYY, hh:mm') ?></td>
                        <td><?= $this->Time->format(h($retailer->modified), 'd MMM YYYY, hh:mm') ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View |'), ['action' => 'view', $retailer->id]) ?>
                            <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $retailer->id]) ?>
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