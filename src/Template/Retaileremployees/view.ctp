<?php
$this->assign('title', __('Retailer Employee') . '/' . __('View'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Employee'), ['controller' => 'RetailerEmployees', 'action' => 'index']);
$this->Html->addCrumb(__('View : '.$retailerEmployee->first_name.' '.$retailerEmployee->last_name));
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-4">
      <div class="box box-primary" style="height: 500px;">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="/IS3102_Final/img/user2-160x160.jpg" alt="User profile picture">

          <h3 class="profile-username text-center"><?= h($retailerEmployee->first_name).' '.h($retailerEmployee->last_name) ?></h3>

          <?php if (!empty($retailerEmployee->retailer_employee_roles)): ?>
          <?php foreach ($retailerEmployee->retailer_employee_roles as $retailerEmployeeRoles): ?>
            <p class="text-muted text-center">
                <?= $this->Html->link(__(h($retailerEmployeeRoles->role_name)), ['controller' => 'RetailerEmployeeRoles', 'action' => 'view', $retailerEmployeeRoles->id]) ?>
            </p>
          <?php endforeach; ?>
          <?php endif; ?> 

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b><?= __('Activation Status') ?></b> 
              <div class="pull-right"><?= h($retailerEmployee->activation_status) ?></div>
            </li>
            <li class="list-group-item">
              <b><?= __('Location') ?></b> 
              <div class="pull-right"><?= $retailerEmployee->has('location') ? $this->Html->link($retailerEmployee->location->name, ['controller' => 'Locations', 'action' => 'view', $retailerEmployee->location->id]) : '' ?></div>
            </li>
          </ul>
            <a class="btn btn-default btn-block" title="Edit Employee Details" href="/IS3102_Final/retailer-employees/edit/<?= $retailerEmployee->id ?>" >Edit Employee Details</a>
        </div>
      </div>
    </div>
    
    <div class="col-md-8">  
        <div class="box box-primary" style="height: 500px;">
            <div class="box-body box-profile">
              <div class="box-header with-border">
                <h3 class="box-title"><?= __('Employee Profile') ?></h3>
              </div>
              <div class="box-body"><br>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th scope="row"><?= __('Username') ?></th>
                        <td><?= h($retailerEmployee->username) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Email') ?></th>
                        <td><?= h($retailerEmployee->email) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Contact') ?></th>
                        <td><?= h($retailerEmployee->contact) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Address') ?></th>
                        <td><?= h($retailerEmployee->address) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($retailerEmployee->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= $this->Time->format(h($retailerEmployee->created), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= $this->Time->format(h($retailerEmployee->modified), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                </table>
              </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#promotions" data-toggle="tab">Latest Promotions</a></li>
          <li><a href="#orders" data-toggle="tab">Latest Purchase Orders</a></li>
          <li><a href="#memos" data-toggle="tab">Latest Supplier Memos</a></li>
          <li><a href="#messages" data-toggle="tab">Latest Messages</a></li>
          <li><a href="#logs" data-toggle="tab">Latest Logs</a></li>
        </ul>

        <div class="tab-content">
            <div class="active tab-pane" id="promotions">
                <?php if (!empty($retailerEmployee->promotions)): ?>
                <table class="table table-bordered table-striped">
                    <tr>
                        <!--<th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Start Date') ?></th>
                        <th scope="col"><?= __('End Date') ?></th>
                        <th scope="col"><?= __('Promo Description') ?></th>
                        <th scope="col"><?= __('First Voucher Num') ?></th>
                        <th scope="col"><?= __('Last Voucher Num') ?></th>
                        <th scope="col"><?= __('Discount Rate') ?></th>
                        <th scope="col"><?= __('Credit Card Type') ?></th>
                        <th scope="col"><?= __('Retailer Employee Id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>-->
                        <th scope="col"><?= __('Promotion ID') ?></th>
                    </tr>
                    <?php foreach ($retailerEmployee->promotions as $promotions): ?>
                    <tr>
                        <!--<td><?= h($promotions->id) ?></td>
                        <td><?= h($promotions->start_date) ?></td>
                        <td><?= h($promotions->end_date) ?></td>
                        <td><?= h($promotions->promo_desc) ?></td>
                        <td><?= h($promotions->first_voucher_num) ?></td>
                        <td><?= h($promotions->last_voucher_num) ?></td>
                        <td><?= h($promotions->discount_rate) ?></td>
                        <td><?= h($promotions->credit_card_type) ?></td>
                        <td><?= h($promotions->retailer_employee_id) ?></td>-->
                        <td>
                            <?= $this->Html->link(__('Promotion '.h($promotions->id)), ['controller' => 'Promotions', 'action' => 'view', $promotions->id]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php else: ?>

                    There is no related promotion.

                <?php endif; ?>
            </div>
            <div class="tab-pane" id="orders">
                <?php if (!empty($retailerEmployee->purchase_orders)): ?>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th scope="col"><?= __('PO Id') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <!--<th scope="col"><?= __('Total Price') ?></th>
                        <th scope="col"><?= __('Delivery Status') ?></th>-->
                        <!--<th scope="col"><?= __('Supplier Id') ?></th>-->
                        <!--<th scope="col"><?= __('Retailer Employee Id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>-->
                    </tr>
                    <?php foreach ($retailerEmployee->purchase_orders as $purchaseOrders): ?>
                    <tr>
                        <td>
                            <?= $this->Html->link(__('PO '.h($purchaseOrders->id)), ['controller' => 'PurchaseOrders', 'action' => 'view', $purchaseOrders->id]) ?>
                        </td>
                        <td>
                            <?= $this->Time->format(h($purchaseOrders->created), 'd MMM YYYY, hh:mm') ?>
                        </td>
                        <!--<td><?= h($purchaseOrders->total_price) ?></td>
                        <td><?= h($purchaseOrders->delivery_status) ?></td>-->
                        <!--<td>
                            <?= $this->Html->link(__(h($purchaseOrders->supplier_id)  ), ['controller' => 'Suppliers', 'action' => 'view', $purchaseOrders->supplier_id]) ?>
                        </td>-->
                        <!--<td><?= h($purchaseOrders->retailer_employee_id) ?></td>-->
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php else: ?>

                    There is no related purchase order.

                <?php endif; ?>
            </div>
            <div class="tab-pane" id="memos">
                <?php if (!empty($retailerEmployee->supplier_memos)): ?>
                <table class="table table-bordered table-striped">
                    <tr>
                        <!--<th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Remarks') ?></th>
                        <th scope="col"><?= __('Created') ?></th>-->
                        <th scope="col"><?= __('Supplier Id') ?></th>
                        <!--<th scope="col"><?= __('Retailer Employee Id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>-->
                    </tr>
                    <?php foreach ($retailerEmployee->supplier_memos as $supplierMemos): ?>
                    <tr>
                        <!--<td><?= h($supplierMemos->id) ?></td>
                        <td><?= h($supplierMemos->remarks) ?></td>
                        <td><?= h($supplierMemos->created) ?></td>-->
                        <td>
                            <?= $this->Html->link(__('Supplier '.h($supplierMemos->supplier_id)), ['controller' => 'SupplierMemos', 'action' => 'view', $supplierMemos->id]) ?>
                        </td>
                        <!--<td><?= h($supplierMemos->retailer_employee_id) ?></td>-->
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php else: ?>

                    There is no related supplier memo.

                <?php endif; ?>
            </div>
            <div class="tab-pane" id="messages">
                <?php if (!empty($retailerEmployee->messages)): ?>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th scope="col"><?= __('Message Id') ?></th>
                        <!--<th scope="col"><?= __('Title') ?></th>
                        <th scope="col"><?= __('Date Created') ?></th>
                        <th scope="col"><?= __('Message') ?></th>
                        <th scope="col"><?= __('Status') ?></th>
                        <th scope="col"><?= __('Reference Id') ?></th>
                        <th scope="col"><?= __('Sender Id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>-->
                    </tr>
                    <?php foreach ($retailerEmployee->messages as $messages): ?>
                    <tr>
                        <!--<td><?= h($messages->id) ?></td>-->
                        <td>
                            <?= $this->Html->link(__('Message '.h($messages->id)), ['controller' => 'Messages', 'action' => 'view', $messages->id]) ?>
                        </td>
                        <!--<td><?= h($messages->date_created) ?></td>
                        <td><?= h($messages->message) ?></td>
                        <td><?= h($messages->status) ?></td>
                        <td><?= h($messages->reference_id) ?></td>
                        <td><?= h($messages->sender_id) ?></td>-->
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php else: ?>

                    There is no related message.

                <?php endif; ?>
            </div>
            <div class="tab-pane" id="logs">
                <?php if (!empty($retailerEmployee->retailer_loggings)): ?>
                <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Action</th>
                    <th scope="col">Entity (ID)</th>
                    <th scope="col">Date</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $limit = 1;

                    $result = $retailerEmployee->retailer_loggings;
                    $result2 = array_slice($result,-5,5);

                    foreach ($result2 as $logs) if($limit < 6){ 

                        ?>
                    <tr>
                        <td><?= $this->Number->format($logs->id) ?></td>
                        <td><?= ucfirst(h($logs->action)) ?></td>
                        <td><?= h($logs->entity) ?> 
                            (<?= $this->Number->format($logs->entityid)?>) 
                        </td>
                        <td><?= $this->Time->format(h($logs->created),'d MMM YYYY, hh:mm') ?></td>
                    </tr>
                    <?php 
                        $limit++;
                        }

                    ?>
                </tbody>
                </table>
                <?php else: ?>

                    There is no related logging.

                <?php endif; ?>
            </div>
        </div>
    </div>
  </div>
</section>
