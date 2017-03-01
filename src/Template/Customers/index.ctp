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
              <h3 class="box-title"><?= __('Customers') ?></h3>
            </div>
            <div class="box-body">
            <br>
                <table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                    <tr>
                        <?php echo $this->Form->create(null);?>
                        <th width="10"></th>
                        <th scope="col"><?= $this->Form->input('username'); ?></th>
                        <th width="60"></th>
                        <th scope="col"><?= $this->Form->input('email'); ?></th>
                        <th width="60"></th>
                        <th scope="col"></th>
                        <th width="30"></th>
                        <th scope="col"></th>
                        <th width="10"></th>
                    </tr>
                    <tr>
                        <th width="10"></th>
                        <th scope="col"><?= $this->Form->input('first_name'); ?></th>
                        <th width="60"></th>
                        <th scope="col"><?= $this->Form->input('last_name'); ?></th>
                        <th width="60"></th>
                        <th scope="col"><?= $this->Form->input('address'); ?></th>
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
                        <!--<th scope="col"><?= $this->Paginator->sort('username') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('password') ?></th>-->
                        <!--<th scope="col"><?= $this->Paginator->sort('address') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('contact') ?></th>-->
                        <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('cust_membership_tier_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <!--<th scope="col"><?= $this->Paginator->sort('activation_status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('activation_token') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('recovery_status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('recovery_token') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('mailing_list') ?></th>-->
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= $this->Number->format($customer->id) ?></td>
                        <!--<td><?= h($customer->username) ?></td>
                        <td><?= h($customer->password) ?></td>-->
                        <!--<td><?= h($customer->address) ?></td>
                        <td><?= h($customer->contact) ?></td>-->
                        <td><?= h($customer->first_name) ?></td>
                        <td><?= h($customer->last_name) ?></td>
                        <td><?= h($customer->email) ?></td>
                        <td><?= $customer->has('cust_membership_tier') ? $this->Html->link($customer->cust_membership_tier->id, ['controller' => 'CustMembershipTiers', 'action' => 'view', $customer->cust_membership_tier->id]) : '' ?></td>
                        <td><?= h($customer->created) ?></td>
                        <td><?= h($customer->modified) ?></td>
                        <!--<td><?= h($customer->activation_status) ?></td>
                        <td><?= h($customer->activation_token) ?></td>
                        <td><?= h($customer->recovery_status) ?></td>
                        <td><?= h($customer->recovery_token) ?></td>
                        <td><?= h($customer->mailing_list) ?></td>-->
                        <td class="actions">
                            <?= $this->Html->link(__('View |'), ['action' => 'view', $customer->id]) ?>
                            <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $customer->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?>
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
