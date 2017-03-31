<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!-- Main content -->
<section class="content">
  <div class="row">

    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Transfer Orders <?= h($transferOrder->id) ?></h3>
      </div>
      <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-success btn-block" title="Edit Transfer Order" href="/IS3102_Final/transfer-orders/edit/<?=$transferOrder->id?>" >Edit Transfer Order</a>
        </div><br><br><br>

        <table class="table table-bordered table-striped">
            <tr>
                <th scope="row"><?= __('ID') ?></th>
                <td><?= h($transferOrder->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('LocationFrom') ?></th>
                <td><?= $this->Number->format($transferOrder->locationFrom) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('LocationTo') ?></th>
                <td><?= $this->Number->format($transferOrder->locationTo) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Status') ?></th>
                <td><?= h($transferOrder->status) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Remarks') ?></th>
                <td><?= h($transferOrder->remarks) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Retailer Employee') ?></th>
                <td><?= $transferOrder->has('retailer_employee') ? $this->Html->link($transferOrder->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $transferOrder->retailer_employee->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Supplier') ?></th>
                <td><?= $transferOrder->has('supplier') ? $this->Html->link($transferOrder->supplier->supplier_name, ['controller' => 'Suppliers', 'action' => 'view', $transferOrder->supplier->id]) : '' ?></td>
            </tr>
            
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($transferOrder->created) ?></td>
            </tr>
        </table>
    </div>
</div>
</div>

<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-body box-profile">
          <div class="box-header with-border">
            <h3 class="box-title"><?= __('Related Items') ?></h3>
        </div>
        <div class="box-body"><br>
            <div class="related">

                <?php if (!empty($transferOrder->items)): ?>
                    <table class="table table-bordered table-striped">
                      <?php foreach ($transferOrder->items as $item): ?>
                        <tr>
                            <td>
                                <?= $this->Html->link(__(h($item->name)), ['controller' => 'Items', 'action' => 'view', $item->id], ['title' => 'View Item Details']) ?></td>
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

