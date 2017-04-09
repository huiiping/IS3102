<?php
$this->assign('title', __('Stock Level') . '/' . __('Add'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Stock Levels'), ['controller' => 'StockLevels', 'action' => 'index']);
$this->Html->addCrumb(__('View Stock Level'));
?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= 'Stock Level of '.$stockLevel->product->prod_name.' at '.$stockLevel->location->name ?></h3>
          </div>
          <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-success btn-block" title="Edit Location Details" href="/IS3102_Final/StockLevels/edit/<?=$stockLevel->id?>">Edit Stock Level</a>
          </div>
          <br><br><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($stockLevel->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Location') ?></th>
                    <td><?= $stockLevel->has('location') ? $this->Html->link($stockLevel->location->name, ['controller' => 'Locations', 'action' => 'view', $stockLevel->location->id], ['title' => 'View Location Details']) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Product') ?></th>
                    <td><?= $stockLevel->has('product') ? $this->Html->link($stockLevel->product->prod_name, ['controller' => 'Products', 'action' => 'view', $stockLevel->product->id], ['title' => 'View Product Details']) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Threshold') ?></th>
                    <td><?= $this->Number->format($stockLevel->threshold) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Status') ?></th>
                    <td><?= h($stockLevel->status) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Retailer Employee') ?></th>
                    <td><?= $stockLevel->has('retailer_employee') ? $this->Html->link($stockLevel->retailer_employee->first_name.' '.$stockLevel->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $stockLevel->retailer_employee->id], ['title' => 'View Employee Details']) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= $this->Time->format(h($stockLevel->created), 'd MMM YYYY, HH:mm') ?></td>
                </tr>
            </table><br>
        </div>
      </div>
    </div>
  </div>
</section>
