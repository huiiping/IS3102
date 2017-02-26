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
              <h3 class="box-title"><?= 'Purchase Order '.h($purchaseOrder->id) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__(' Edit Purchase Order'), ['action' => 'edit', $purchaseOrder->id]) ?>
              </div>
              <div class="pull-right">
              </div> 
              <div class="pull-right">
                <?= $this->Html->link(__('Add Purchase Order Item | '), ['controller' => 'purchase_order_items', 'action' => 'add']) ?>
              </div>              
            </div>
            <div class="box-body">

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Supplier') ?></th>
                        <td><?= $purchaseOrder->has('supplier') ? $this->Html->link($purchaseOrder->supplier->supplier_name, ['controller' => 'Suppliers', 'action' => 'view', $purchaseOrder->supplier->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Total Price') ?></th>
                        <td><?= $this->Number->format($purchaseOrder->total_price) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Delivery Status') ?></th>
                        <td><?= $purchaseOrder->delivery_status ? __('Yes') : __('No'); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Retailer Employee') ?></th>
                        <td><?= $purchaseOrder->has('retailer_employee') ? $this->Html->link($purchaseOrder->retailer_employee->first_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $purchaseOrder->retailer_employee->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($purchaseOrder->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= $this->Time->format(h($purchaseOrder->created), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                </table>
                <div class="related">
                    <?php if (!empty($purchaseOrder->purchase_order_items)): ?>
                    <h4><?= __('Related Purchase Order Items') ?></h4>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Item ID') ?></th>
                            <th scope="col"><?= __('Item Name') ?></th>
                            <th scope="col"><?= __('Item Desc') ?></th>
                            <th scope="col"><?= __('Quantity') ?></th>
                            <th scope="col"><?= __('Unit Price') ?></th>
                            <th scope="col"><?= __('Sub Total Price') ?></th>
                            <!--<th scope="col"><?= __('Purchase Order Id') ?></th>-->
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($purchaseOrder->purchase_order_items as $purchaseOrderItems): ?>
                        <tr>
                            <td><?= h($purchaseOrderItems->id) ?></td>
                            <td><?= h($purchaseOrderItems->item_ID) ?></td>
                            <td>
                                <?= $this->Html->link(__(h($purchaseOrderItems->item_name)), ['controller' => 'PurchaseOrderItems', 'action' => 'view', $purchaseOrderItems->id]) ?>
                            </td>
                            <td><?= h($purchaseOrderItems->item_desc) ?></td>
                            <td><?= h($purchaseOrderItems->quantity) ?></td>
                            <td><?= h($purchaseOrderItems->unit_price) ?></td>
                            <td><?= h($purchaseOrderItems->sub_total_price) ?></td>
                            <!--<td><?= h($purchaseOrderItems->purchase_order_id) ?></td>-->
                            <td class="actions">
                                <!--<?= $this->Html->link(__('View'), ['controller' => 'PurchaseOrderItems', 'action' => 'view', $purchaseOrderItems->id]) ?>-->
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseOrderItems', 'action' => 'edit', $purchaseOrderItems->id]) ?>
                                <!--<?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseOrderItems', 'action' => 'delete', $purchaseOrderItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrderItems->id)]) ?>-->
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </section>
</div>
