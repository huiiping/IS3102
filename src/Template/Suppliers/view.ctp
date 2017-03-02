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
        <div class="col-xs-4">
          <div class="box box-primary" style="height: 100%;">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center"><?= h($supplier->supplier_name) ?></h3>
              <br>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><?= __('Activation Status') ?></b> 
                  <div class="pull-right"><?= h($supplier->activation_status) ?></div>
                </li>
                <li class="list-group-item">
                  <b><?= __('Email') ?></b> 
                  <div class="pull-right"><?= h($supplier->email) ?></div>
                </li>
                <li class="list-group-item">
                  <b><?= __('Contact') ?></b> 
                  <div class="pull-right"><?= h($supplier->contact) ?></div>
                </li>
              </ul>
              <br>
              <div class="btn btn-default btn-block">
                <?= $this->Html->link(__('Edit Supplier'), ['action' => 'edit', $supplier->id]) ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">  
            <div class="box box-primary">
                <div class="box-body box-profile">
                  <div class="box-header with-border">
                    <h3 class="box-title"><?= __('Supplier Profile') ?></h3>
                  </div>
                  <div class="box-body"><br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th scope="row"><?= __('Supplier Name') ?></th>
                            <td><?= h($supplier->supplier_name) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Username') ?></th>
                            <td><?= h($supplier->username) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Address') ?></th>
                            <td><?= h($supplier->address) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Country') ?></th>
                            <td><?= h($supplier->country) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Bank Account') ?></th>
                            <td><?= h($supplier->bank_acc) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($supplier->id) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= $this->Time->format(h($supplier->created), 'd MMM YYYY, hh:mm') ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= $this->Time->format(h($supplier->modified), 'd MMM YYYY, hh:mm') ?></td>
                        </tr>
                    </table>
                  </div>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-body box-profile">
                  <div class="box-header with-border">
                    <h3 class="box-title"><?= __('Related Purchase Orders') ?></h3>
                  </div>
                  <div class="box-body"><br>
                    <div class="related">
                      <?php if (!empty($supplier->purchase_orders)): ?>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th scope="col"><?= __('PO Id') ?></th>
                                <th scope="col"><?= __('Created') ?></th>
                                <!--<th scope="col"><?= __('Total Price') ?></th>
                                <th scope="col"><?= __('Delivery Status') ?></th>
                                <th scope="col"><?= __('Supplier Id') ?></th>
                                <th scope="col"><?= __('Retailer Employee Id') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>-->
                            </tr>
                            <?php foreach ($supplier->purchase_orders as $purchaseOrders): ?>
                            <tr>
                                <td>
                                    <?= $this->Html->link(__('PO '.h($purchaseOrders->id)), ['controller' => 'PurchaseOrders', 'action' => 'view', $purchaseOrders->id]) ?>
                                </td>
                                <td><?= $this->Time->format(h($purchaseOrders->created), 'd MMM YYYY, hh:mm') ?></td>
                                <!--<td><?= h($purchaseOrders->total_price) ?></td>
                                <td><?= h($purchaseOrders->delivery_status) ?></td>
                                <td><?= h($purchaseOrders->supplier_id) ?></td>
                                <td><?= h($purchaseOrders->retailer_employee_id) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'PurchaseOrders', 'action' => 'view', $purchaseOrders->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseOrders', 'action' => 'edit', $purchaseOrders->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseOrders', 'action' => 'delete', $purchaseOrders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrders->id)]) ?>
                                </td>-->
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
  </section>
</div>
