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
              <h3 class="box-title"><?= h($retailerAccType->name) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit Retailer Account Type'), ['action' => 'edit', $retailerAccType->id]) ?>
              </div>
            </div>
            <div class="box-body">

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($retailerAccType->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('No. Of Users') ?></th>
                        <td><?= $this->Number->format($retailerAccType->num_of_users) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('No. Of Warehouses') ?></th>
                        <td><?= $this->Number->format($retailerAccType->num_of_warehouses) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('No. Of Stores') ?></th>
                        <td><?= $this->Number->format($retailerAccType->num_of_stores) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('No. Of Product Types') ?></th>
                        <td><?= $this->Number->format($retailerAccType->num_of_product_types) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($retailerAccType->id) ?></td>
                    </tr>
                    <!--<tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($retailerAccType->created) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($retailerAccType->modified) ?></td>
                    </tr>-->
                </table>
                <div class="related">
                    <?php if (!empty($retailerAccType->retailers)): ?>
                    <h4><?= __('Related Retailers') ?></h4>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <!--<th scope="col"><?= __('Id') ?></th>-->
                            <th scope="col"><?= __('Retailer Name') ?></th>
                            <!--<th scope="col"><?= __('Retailer Desc') ?></th>
                            <th scope="col"><?= __('Account Status') ?></th>
                            <th scope="col"><?= __('Payment Term') ?></th>
                            <th scope="col"><?= __('Retailer Email') ?></th>
                            <th scope="col"><?= __('Address') ?></th>
                            <th scope="col"><?= __('Contact') ?></th>
                            <th scope="col"><?= __('Contract Start Date') ?></th>
                            <th scope="col"><?= __('Contract End Date') ?></th>
                            <th scope="col"><?= __('Num Of Users') ?></th>
                            <th scope="col"><?= __('Num Of Warehouses') ?></th>
                            <th scope="col"><?= __('Num Of Stores') ?></th>
                            <th scope="col"><?= __('Num Of Product Types') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Modified') ?></th>
                            <th scope="col"><?= __('Retailer Acc Type Id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>-->
                        </tr>
                        <?php foreach ($retailerAccType->retailers as $retailers): ?>
                        <tr>
                            <!--<td><?= h($retailers->id) ?></td>-->
                            <td>
                                <?= $this->Html->link(__(h($retailers->retailer_name)), ['controller' => 'Retailers', 'action' => 'view', $retailers->id]) ?>
                            </td>
                            <!--<td><?= h($retailers->retailer_desc) ?></td>
                            <td><?= h($retailers->account_status) ?></td>
                            <td><?= h($retailers->payment_term) ?></td>
                            <td><?= h($retailers->retailer_email) ?></td>
                            <td><?= h($retailers->address) ?></td>
                            <td><?= h($retailers->contact) ?></td>
                            <td><?= h($retailers->contract_start_date) ?></td>
                            <td><?= h($retailers->contract_end_date) ?></td>
                            <td><?= h($retailers->num_of_users) ?></td>
                            <td><?= h($retailers->num_of_warehouses) ?></td>
                            <td><?= h($retailers->num_of_stores) ?></td>
                            <td><?= h($retailers->num_of_product_types) ?></td>
                            <td><?= h($retailers->created) ?></td>
                            <td><?= h($retailers->modified) ?></td>
                            <td><?= h($retailers->retailer_acc_type_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Retailers', 'action' => 'view', $retailers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Retailers', 'action' => 'edit', $retailers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Retailers', 'action' => 'delete', $retailers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailers->id)]) ?>
                            </td>-->
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
      </div>
  </section>
</div>