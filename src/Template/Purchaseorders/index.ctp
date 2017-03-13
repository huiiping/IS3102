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
              <h3 class="box-title"><?= __('Purchase Orders') ?></h3>
            </div>
            <div class="box-body">
            <br>
              <table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                  <tr>
                    <?php echo $this->Form->create(null);?>
                      <th width="10"></th>
                      <th scope="col"><?= $this->Form->input(('search'), ['label' => 'Ssearch', 'type' => 'search']); ?></th>
                      <th width="60"></th>
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
                        <!--<th scope="col"><?= $this->Paginator->sort('total_price') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('delivery_status') ?></th>-->
                        <th scope="col"><?= $this->Paginator->sort('supplier_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <!--<th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>-->
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($purchaseOrders as $purchaseOrder): ?>
                    <tr>
                        <td><?= $this->Number->format($purchaseOrder->id) ?></td>
                        <!--<td><?= $this->Number->format($purchaseOrder->total_price) ?></td>
                        <td><?= h($purchaseOrder->delivery_status) ?></td>-->
                        <td><?= $purchaseOrder->has('supplier') ? $this->Html->link($purchaseOrder->supplier->supplier_name, ['controller' => 'Suppliers', 'action' => 'view', $purchaseOrder->supplier->id]) : '' ?></td>
                        <td><?= $this->Time->format(h($purchaseOrder->created), 'd MMM YYYY, hh:mm') ?></td>
                        <!--<td><?= $purchaseOrder->has('retailer_employee') ? $this->Html->link($purchaseOrder->retailer_employee->id, ['controller' => 'RetailerEmployees', 'action' => 'view', $purchaseOrder->retailer_employee->id]) : '' ?></td>-->
                        <td class="actions">
                            <?= $this->Html->link(__('View |'), ['action' => 'view', $purchaseOrder->id]) ?>
                            <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $purchaseOrder->id]) ?>
                            <?= $this->Form->postLink(__('Delete |'), ['action' => 'delete', $purchaseOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrder->id)]) ?>
                            <?= $this->Html->link(__('Message'), ['controller' => 'Messages', 'action' => 'index', 0, $this->request->params['controller'], $purchaseOrder->id]) ?>
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
