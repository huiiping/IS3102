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
              <h3 class="box-title"><?= h($supplier->supplier_name) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit Supplier'), ['action' => 'edit', $supplier->id]) ?>
              </div>
            </div>
            <div class="box-body">

            <table class="vertical-table">
                <tr>
                    <th scope="row"><?= __('Supplier Name') ?></th>
                    <td><?= h($supplier->supplier_name) ?></td>
                </tr>
                <!--<tr>
                    <th scope="row"><?= __('Username') ?></th>
                    <td><?= h($supplier->username) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Password') ?></th>
                    <td><?= h($supplier->password) ?></td>
                </tr>-->
                <tr>
                    <th scope="row"><?= __('Email') ?></th>
                    <td><?= h($supplier->email) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Contact') ?></th>
                    <td><?= h($supplier->contact) ?></td>
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
                    <th scope="row"><?= __('Activation Status') ?></th>
                    <td><?= h($supplier->activation_status) ?></td>
                </tr>
                <!--<tr>
                    <th scope="row"><?= __('Activation Token') ?></th>
                    <td><?= h($supplier->activation_token) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Recovery Status') ?></th>
                    <td><?= h($supplier->recovery_status) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Recovery Token') ?></th>
                    <td><?= h($supplier->recovery_token) ?></td>
                </tr>-->
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
            <div class="related">
                <?php if (!empty($supplier->purchase_orders)): ?>
                <h4><?= __('Related Purchase Orders') ?></h4>
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
            <div class="related">
                <?php if (!empty($supplier->supplier_memos)): ?>
                <h4><?= __('Related Supplier Memos') ?></h4>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th scope="col"><?= __('Memo Id') ?></th>
                        <!--<th scope="col"><?= __('Remarks') ?></th>-->
                        <th scope="col"><?= __('Created') ?></th>
                        <!--<th scope="col"><?= __('Supplier Id') ?></th>
                        <th scope="col"><?= __('Retailer Employee Id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>-->
                    </tr>
                    <?php foreach ($supplier->supplier_memos as $supplierMemos): ?>
                    <tr>
                        <td>
                            <?= $this->Html->link(__('Memo '.h($supplierMemos->id)), ['controller' => 'SupplierMemos', 'action' => 'view', $supplierMemos->id]) ?>
                        </td>
                        <!--<td><?= h($supplierMemos->remarks) ?></td>-->
                        <td><?= $this->Time->format(h($supplierMemos->created), 'd MMM YYYY, hh:mm') ?></td>
                        <!--<td><?= h($supplierMemos->supplier_id) ?></td>
                        <td><?= h($supplierMemos->retailer_employee_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'SupplierMemos', 'action' => 'view', $supplierMemos->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'SupplierMemos', 'action' => 'edit', $supplierMemos->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'SupplierMemos', 'action' => 'delete', $supplierMemos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierMemos->id)]) ?>
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
