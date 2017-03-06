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
        <div class="col-xs-4">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center"><?= h($retailer->retailer_name) ?></h3>
              <br>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><?= __('Account Type') ?></b> 
                  <div class="pull-right">
                      <?= $retailer->has('retailer_acc_type') ? $this->Html->link($retailer->retailer_acc_type->name, ['controller' => 'RetailerAccTypes', 'action' => 'view', $retailer->retailer_acc_type->id]) : '' ?>
                  </div>
                </li>
                <li class="list-group-item">
                  <b><?= __('Account Status') ?></b> 
                  <div class="pull-right"><?= h($retailer->account_status) ?></div>
                </li>
                <li class="list-group-item">
                  <b><?= __('Email') ?></b> 
                  <div class="pull-right"><?= h($retailer->retailer_email) ?></div>
                </li>
                <li class="list-group-item">
                  <b><?= __('Contact') ?></b> 
                  <div class="pull-right"><?= h($retailer->contact) ?></div>
                </li>
              </ul>
              <br>
              <?php if ($retailer->account_status == 'Activated'): ?>
                 <div class="btn btn-default btn-block">
                    <?= $this->Html->link(__('Deactivate Retailer'), ['action' => 'deactivateStatus', $retailer->id]) ?>
                  </div><br>
              <?php else: ?>
                 <div class="btn btn-default btn-block">
                    <?= $this->Html->link(__('Activate Retailer'), ['action' => 'activateStatus', $retailer->id]) ?>
                  </div><br>
              <?php endif; ?>
              <div class="btn btn-default btn-block">
                <?= $this->Html->link(__('Edit Retailer'), ['action' => 'edit', $retailer->id]) ?>
              </div><br>
              <div class="btn btn-default btn-block">
                <?= $this->Html->link(__('View Retailer Loyalty Points'), ['controller' => 'retailer_loyalty_points', 'action' => 'individual', $retailer->id]) ?>
              </div>
              <br>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-body box-profile">
              <div class="box-header with-border">
                <h3 class="box-title"><?= __('Account Type Details') ?></h3>
              </div>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><?= __('No. Of Users') ?></b> 
                  <div class="pull-right"><?= $this->Number->format($retailer->num_of_users) ?></div>
                </li>
                <li class="list-group-item">
                  <b><?= __('No. Of Warehouses') ?></b> 
                  <div class="pull-right"><?= $this->Number->format($retailer->num_of_warehouses) ?></div>
                </li>
                <li class="list-group-item">
                  <b><?= __('No. Of Stores') ?></b> 
                  <div class="pull-right"><?= $this->Number->format($retailer->num_of_stores) ?></div>
                </li>
                <li class="list-group-item">
                  <b><?= __('No. Of Product Types') ?></b> 
                  <div class="pull-right"><?= $this->Number->format($retailer->num_of_product_types) ?></div>
                </li>
              </ul>
              <br>
            </div>
          </div>
        </div>
        <div class="col-md-8">  
          <div class="box box-primary" style="height: 100%;">
              <div class="box-body box-profile">
                <div class="box-header with-border">
                  <h3 class="box-title"><?= __('Retailer Profile') ?></h3>
                </div>
                <div class="box-body"><br>
                  <table class="table table-bordered table-striped">
                    <tr>
                        <th scope="row"><?= __('Retailer Name') ?></th>
                        <td><?= h($retailer->retailer_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Retailer Description') ?></th>
                        <td><?= $this->Text->autoParagraph(h($retailer->retailer_desc)); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Address') ?></th>
                        <td><?= h($retailer->address) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Payment Term') ?></th>
                        <td><?= h($retailer->payment_term) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Contract Start Date') ?></th>
                        <td><?= $this->Time->format(h($retailer->contract_start_date), 'd MMM YYYY') ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Contract End Date') ?></th>
                        <td><?= $this->Time->format(h($retailer->contract_end_date), 'd MMM YYYY') ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($retailer->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= $this->Time->format(h($retailer->created), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= $this->Time->format(h($retailer->modified), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>