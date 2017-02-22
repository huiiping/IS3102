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
              <h3 class="box-title"><?= h($retailerEmployee->first_name).' '.h($retailerEmployee->last_name) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit Retailer Employee'), ['action' => 'edit', $retailerEmployee->id]) ?>
              </div>
            </div>
            <div class="box-body">

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Username') ?></th>
                        <td><?= h($retailerEmployee->username) ?></td>
                    </tr>
                    <!--<tr>
                        <th scope="row"><?= __('Password') ?></th>
                        <td><?= h($retailerEmployee->password) ?></td>
                    </tr>-->
                    <tr>
                        <th scope="row"><?= __('Email') ?></th>
                        <td><?= h($retailerEmployee->email) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Address') ?></th>
                        <td><?= h($retailerEmployee->address) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Contact') ?></th>
                        <td><?= h($retailerEmployee->contact) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('First Name') ?></th>
                        <td><?= h($retailerEmployee->first_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Last Name') ?></th>
                        <td><?= h($retailerEmployee->last_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Account Status') ?></th>
                        <td><?= h($retailerEmployee->account_status) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Location') ?></th>
                        <td><?= $retailerEmployee->has('location') ? $this->Html->link($retailerEmployee->location->name, ['controller' => 'Locations', 'action' => 'view', $retailerEmployee->location->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($retailerEmployee->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($retailerEmployee->created) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($retailerEmployee->modified) ?></td>
                    </tr>
                </table>
                <div class="related">
                    <h4><?= __('Related Promotions') ?></h4>
                    <?php if (!empty($retailerEmployee->promotions)): ?>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Start Date') ?></th>
                            <th scope="col"><?= __('End Date') ?></th>
                            <th scope="col"><?= __('Promo Desc') ?></th>
                            <th scope="col"><?= __('First Vouher Num') ?></th>
                            <th scope="col"><?= __('Last Voucher Num') ?></th>
                            <th scope="col"><?= __('Discount Rate') ?></th>
                            <th scope="col"><?= __('Credit Card Type') ?></th>
                            <th scope="col"><?= __('Retailer Employee Id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($retailerEmployee->promotions as $promotions): ?>
                        <tr>
                            <td><?= h($promotions->id) ?></td>
                            <td><?= h($promotions->start_date) ?></td>
                            <td><?= h($promotions->end_date) ?></td>
                            <td><?= h($promotions->promo_desc) ?></td>
                            <td><?= h($promotions->first_vouher_num) ?></td>
                            <td><?= h($promotions->last_voucher_num) ?></td>
                            <td><?= h($promotions->discount_rate) ?></td>
                            <td><?= h($promotions->credit_card_type) ?></td>
                            <td><?= h($promotions->retailer_employee_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Promotions', 'action' => 'view', $promotions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Promotions', 'action' => 'edit', $promotions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Promotions', 'action' => 'delete', $promotions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
                <div class="related">
                    <h4><?= __('Related Purchase Orders') ?></h4>
                    <?php if (!empty($retailerEmployee->purchase_orders)): ?>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Total Price') ?></th>
                            <th scope="col"><?= __('Delivery Status') ?></th>
                            <th scope="col"><?= __('Supplier Id') ?></th>
                            <th scope="col"><?= __('Retailer Employee Id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($retailerEmployee->purchase_orders as $purchaseOrders): ?>
                        <tr>
                            <td><?= h($purchaseOrders->id) ?></td>
                            <td><?= h($purchaseOrders->created) ?></td>
                            <td><?= h($purchaseOrders->total_price) ?></td>
                            <td><?= h($purchaseOrders->delivery_status) ?></td>
                            <td><?= h($purchaseOrders->supplier_id) ?></td>
                            <td><?= h($purchaseOrders->retailer_employee_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PurchaseOrders', 'action' => 'view', $purchaseOrders->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseOrders', 'action' => 'edit', $purchaseOrders->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseOrders', 'action' => 'delete', $purchaseOrders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrders->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
                <div class="related">
                    <h4><?= __('Related Supplier Memos') ?></h4>
                    <?php if (!empty($retailerEmployee->supplier_memos)): ?>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Remarks') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Supplier Id') ?></th>
                            <th scope="col"><?= __('Retailer Employee Id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($retailerEmployee->supplier_memos as $supplierMemos): ?>
                        <tr>
                            <td><?= h($supplierMemos->id) ?></td>
                            <td><?= h($supplierMemos->remarks) ?></td>
                            <td><?= h($supplierMemos->created) ?></td>
                            <td><?= h($supplierMemos->supplier_id) ?></td>
                            <td><?= h($supplierMemos->retailer_employee_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SupplierMemos', 'action' => 'view', $supplierMemos->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SupplierMemos', 'action' => 'edit', $supplierMemos->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SupplierMemos', 'action' => 'delete', $supplierMemos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierMemos->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
                <div class="related">
                    <h4><?= __('Related Messages') ?></h4>
                    <?php if (!empty($retailerEmployee->messages)): ?>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Title') ?></th>
                            <th scope="col"><?= __('Date Created') ?></th>
                            <th scope="col"><?= __('Message') ?></th>
                            <th scope="col"><?= __('Status') ?></th>
                            <th scope="col"><?= __('Reference Id') ?></th>
                            <th scope="col"><?= __('Sender Id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($retailerEmployee->messages as $messages): ?>
                        <tr>
                            <td><?= h($messages->id) ?></td>
                            <td><?= h($messages->title) ?></td>
                            <td><?= h($messages->date_created) ?></td>
                            <td><?= h($messages->message) ?></td>
                            <td><?= h($messages->status) ?></td>
                            <td><?= h($messages->reference_id) ?></td>
                            <td><?= h($messages->sender_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Messages', 'action' => 'view', $messages->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Messages', 'action' => 'edit', $messages->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Messages', 'action' => 'delete', $messages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $messages->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
                <div class="related">
                    <h4><?= __('Related Retailer Employee Roles') ?></h4>
                    <?php if (!empty($retailerEmployee->retailer_employee_roles)): ?>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Role Name') ?></th>
                            <th scope="col"><?= __('Role Desc') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($retailerEmployee->retailer_employee_roles as $retailerEmployeeRoles): ?>
                        <tr>
                            <td><?= h($retailerEmployeeRoles->id) ?></td>
                            <td><?= h($retailerEmployeeRoles->role_name) ?></td>
                            <td><?= h($retailerEmployeeRoles->role_desc) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'RetailerEmployeeRoles', 'action' => 'view', $retailerEmployeeRoles->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'RetailerEmployeeRoles', 'action' => 'edit', $retailerEmployeeRoles->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'RetailerEmployeeRoles', 'action' => 'delete', $retailerEmployeeRoles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerEmployeeRoles->id)]) ?>
                            </td>
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
