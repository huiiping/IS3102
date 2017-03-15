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
              <h3 class="box-title"><?= 'Supplier Memo '.h($supplierMemo->id) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit '), ['action' => 'edit', $supplierMemo->id]) ?> | 
                <?= $this->Html->link(__('Delete'), ['action' => 'delete', $supplierMemo->id]) ?>
              </div>
            </div>
            <div class="box-body">

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Remarks') ?></th>
                        <td><?= h($supplierMemo->remarks) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Supplier') ?></th>
                        <td><?= $supplierMemo->has('supplier') ? $this->Html->link($supplierMemo->supplier->supplier_name, ['controller' => 'Suppliers', 'action' => 'view', $supplierMemo->supplier->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Retailer Employee') ?></th>
                        <td><?= $supplierMemo->has('retailer_employee') ? $this->Html->link($supplierMemo->retailer_employee->first_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $supplierMemo->retailer_employee->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($supplierMemo->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= $this->Time->format(h($supplierMemo->created), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                </table>
            </div>
        </div>
      </div>
  </section>
</div>
