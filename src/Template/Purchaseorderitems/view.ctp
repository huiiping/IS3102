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
              <h3 class="box-title"><?= h($purchaseOrderItem->item_name) ?></h3>
              <?php if(!$type) : ?> 
              <div class="pull-right">
                <?= $this->Html->link(__('Edit Purchase Order Item'), ['action' => 'edit', $purchaseOrderItem->id]) ?>
              </div>
              <?php endif; ?>
            </div>
            <div class="box-body">

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Item ID') ?></th>
                        <td><?= $this->Number->format($purchaseOrderItem->item_ID) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Item Name') ?></th>
                        <td><?= h($purchaseOrderItem->item_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Item Description') ?></th>
                        <td><?= $this->Text->autoParagraph(h($purchaseOrderItem->item_desc)); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Quantity') ?></th>
                        <td><?= $this->Number->format($purchaseOrderItem->quantity) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Unit Price') ?></th>
                        <td><?= $this->Number->format($purchaseOrderItem->unit_price) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Sub Total Price') ?></th>
                        <td><?= $this->Number->format($purchaseOrderItem->sub_total_price) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Purchase Order') ?></th>
                        <td><?= $purchaseOrderItem->has('purchase_order') ? $this->Html->link($purchaseOrderItem->purchase_order->id, ['controller' => 'PurchaseOrders', 'action' => 'view', $purchaseOrderItem->purchase_order->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($purchaseOrderItem->id) ?></td>
                    </tr>
                </table>
            </div>
        </div>
      </div>
  </section>
</div>
