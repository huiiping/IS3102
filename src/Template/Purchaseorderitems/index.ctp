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
              <h3 class="box-title"><?= __('Purchase Order Items') ?></h3>
            </div>
            <div class="box-body">
                <br>
                <!--<legend><h4><?= __('Search') ?></h4></legend>-->
                <table cellpadding="0" cellspacing="0", bgcolor="#FFFFFF">
                    <tr><?php
                        echo $this->Form->create($purchaseOrderItems);?>
                        <th width="10"></th>
                        <th scope="col"><?= $this->Form->input(('search'), ['label' => 'Search', 'type' => 'search']); ?></th>
                        <th width="10"></th>

                        <th scope="col" class="actions"><?= $this->Form->submit(__('Search'), ['class'=>'btn btn-default btn-flat']); ?></th>
                        <th width="10"></th>
                        <?php echo $this->Form->end();?>
                    </tr>
                </table>
                <br>
              <table class="table table-bordered table-striped">
              
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('item_ID') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('item_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('unit_price') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('sub_total_price') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('purchase_order_id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($purchaseOrderItems as $purchaseOrderItem): ?>
                    <tr>
                        <td><?= $this->Number->format($purchaseOrderItem->id) ?></td>
                        <td><?= $this->Number->format($purchaseOrderItem->item_ID) ?></td>
                        <td><?= h($purchaseOrderItem->item_name) ?></td>
                        <td><?= $this->Number->format($purchaseOrderItem->quantity) ?></td>
                        <td><?= $this->Number->format($purchaseOrderItem->unit_price) ?></td>
                        <td><?= $this->Number->format($purchaseOrderItem->sub_total_price) ?></td>
                        <td><?= $purchaseOrderItem->has('purchase_order') ? $this->Html->link($purchaseOrderItem->purchase_order->id, ['controller' => 'PurchaseOrders', 'action' => 'view', $purchaseOrderItem->purchase_order->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $purchaseOrderItem->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchaseOrderItem->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchaseOrderItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrderItem->id)]) ?>
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
