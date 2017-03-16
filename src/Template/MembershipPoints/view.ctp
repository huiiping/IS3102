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
              <h3 class="box-title"><?= 'Membership Point ID '.h($membershipPoint->id) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit '), ['action' => 'edit', $retailerEmployee->id]) ?>
              </div>
            </div>
            <div class="box-body">
                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Customer') ?></th>
                        <td><?= $membershipPoint->has('customer') ? $this->Html->link($membershipPoint->customer->id, ['controller' => 'Customers', 'action' => 'view', $membershipPoint->customer->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Type') ?></th>
                        <td><?= h($membershipPoint->type) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Remarks') ?></th>
                        <td><?= h($membershipPoint->remarks) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Retailer Employee') ?></th>
                        <td><?= $membershipPoint->has('retailer_employee') ? $this->Html->link($membershipPoint->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $membershipPoint->retailer_employee->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($membershipPoint->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Pts') ?></th>
                        <td><?= $this->Number->format($membershipPoint->pts) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($membershipPoint->created) ?></td>
                    </tr>
                </table>
            </div>
        </div>
      </div>
  </section>
</div>
