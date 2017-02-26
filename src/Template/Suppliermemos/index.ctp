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
              <h3 class="box-title"><?= __('Supplier Memos') ?></h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('supplier_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <!--<th scope="col"><?= $this->Paginator->sort('remarks') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>-->
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($supplierMemos as $supplierMemo): ?>
                    <tr>
                        <td><?= $this->Number->format($supplierMemo->id) ?></td>
                        <td><?= $supplierMemo->has('supplier') ? $this->Html->link($supplierMemo->supplier->supplier_name, ['controller' => 'Suppliers', 'action' => 'view', $supplierMemo->supplier->id]) : '' ?></td>
                        <td><?= $this->Time->format(h($supplierMemo->created), 'd MMM YYYY, hh:mm') ?></td>
                        <!--<td><?= h($supplierMemo->remarks) ?></td>
                        <td><?= $supplierMemo->has('retailer_employee') ? $this->Html->link($supplierMemo->retailer_employee->id, ['controller' => 'RetailerEmployees', 'action' => 'view', $supplierMemo->retailer_employee->id]) : '' ?></td>-->
                        <td class="actions">
                            <?= $this->Html->link(__('View |'), ['action' => 'view', $supplierMemo->id]) ?>
                            <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $supplierMemo->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplierMemo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierMemo->id)]) ?>
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
