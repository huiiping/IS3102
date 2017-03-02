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
              <h3 class="box-title"><?= __('Search Suppliers') ?></h3>
            </div>
            <div class="box-body">
              <br>
              <?php if(!$type) : ?>
              <table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                <tr>
                    <?php echo $this->Form->create(null);?>
                    <th width="10"></th>
                    <th scope="col"><?= $this->Form->input('supplier_name'); ?></th>
                    <th width="60"></th>
                    <th scope="col"><?= $this->Form->input('country'); ?></th>
                    <th width="60"></th>
                    <th scope="col"><?= $this->Form->input('address'); ?></th>
                    <th width="30"></th>
                    <th scope="col" class="actions"><?= $this->Form->submit(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?></th>
                    <th width="10"></th>
                    <?php echo $this->Form->end();?>
                </tr>
                </table>
                <br>
                <?php endif; ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <!--<th scope="col"><?= $this->Paginator->sort('username') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('password') ?></th>-->
                            <th scope="col"><?= $this->Paginator->sort('supplier_name') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                            <!--<th scope="col"><?= $this->Paginator->sort('address') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('contact') ?></th>-->
                            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                            <!--<th scope="col"><?= $this->Paginator->sort('country') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('activation_status') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('activation_token') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('recovery_status') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('recovery_token') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('bank_acc') ?></th>-->
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($suppliers as $supplier): ?>
                        <tr>
                            <td><?= $this->Number->format($supplier->id) ?></td>
                            <!--<td><?= h($supplier->username) ?></td>
                            <td><?= h($supplier->password) ?></td>-->
                            <td><?= h($supplier->supplier_name) ?></td>
                            <td><?= h($supplier->email) ?></td>
                            <!--<td><?= h($supplier->address) ?></td>
                            <td><?= h($supplier->contact) ?></td>-->
                            <td><?= $this->Time->format(h($supplier->created), 'd MMM YYYY, hh:mm') ?></td>
                            <td><?= $this->Time->format(h($supplier->modified), 'd MMM YYYY, hh:mm') ?></td>
                            <!--<td><?= h($supplier->country) ?></td>
                            <td><?= h($supplier->activation_status) ?></td>
                            <td><?= h($supplier->activation_token) ?></td>
                            <td><?= h($supplier->recovery_status) ?></td>
                            <td><?= h($supplier->recovery_token) ?></td>
                            <td><?= h($supplier->bank_acc) ?></td>-->
                            <td class="actions">
                                <?= $this->Html->link(__('View |'), ['action' => 'view', $supplier->id]) ?>
                                <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $supplier->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?>
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
