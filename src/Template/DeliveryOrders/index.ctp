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
          <h3 class="box-title"><?= __('Delivery Orders') ?></h3>
      </div>
      <div class="box-body">
          <div class="pull-right">
          <a class="btn btn-success btn-block" title="Create New Delivery Order" href="/IS3102_Final/delivery-orders/add">Create New Delivery Order</a>
        </div>
        <br>
        <!--<legend><h4><?= __('Search') ?></h4></legend>-->
        <form method="post" accept-charset="utf-8" action="/IS3102_Final/delivery-order">
            <table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
              <tr>
                <th width="10"></th>
                <th scope="col">
                  <div class ="form-group">
                    <div class="input-group">
                      <label for="search"></label>&nbsp&nbsp&nbsp
                      <input class = "form-control" type="text" name="search" id="search" placeholder="Search">
                  </div>
              </div>
          </th>
          <th width="30"></th>
          <th scope="col" class ="form-group">
              <div class ="submit">
                <input class = "form-control" type="submit" class="btn btn-default bth-flat" value="Search">
            </div>
        </th>
    </tr>
</table>
</form>
<br>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('status') ?></th>
            <!-- <th scope="col"><?= $this->Paginator->sort('fee') ?></th> -->
            <th scope="col"><?= $this->Paginator->sort('deliverer') ?></th>
            <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('transaction_id') ?></th>
            <!-- <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
            <!-- <th scope="col"><?= $this->Paginator->sort('created') ?></th> -->
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($deliveryOrders as $deliveryOrder): ?>
            <tr>
                <td><?= $this->Number->format($deliveryOrder->id) ?></td>
                <td><?= h($deliveryOrder->status) ?></td>
                <!-- <td><?= $this->Number->format($deliveryOrder->fee) ?></td> -->
                <td><?= h($deliveryOrder->deliverer) ?></td>
                <td><?= $deliveryOrder->has('customer') ? $this->Html->link($deliveryOrder->customer->id, ['controller' => 'Customers', 'action' => 'view', $deliveryOrder->customer->id]) : '' ?></td>
                <td><?= $deliveryOrder->has('retailer_employee') ? $this->Html->link($deliveryOrder->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $deliveryOrder->retailer_employee->id]) : '' ?></td>
                <td><?= $deliveryOrder->has('location') ? $this->Html->link($deliveryOrder->location->name, ['controller' => 'Locations', 'action' => 'view', $deliveryOrder->location->id]) : '' ?></td>
                <td><?= $deliveryOrder->has('transaction') ? $this->Html->link($deliveryOrder->transaction->id, ['controller' => 'Transactions', 'action' => 'view', $deliveryOrder->transaction->id]) : '' ?></td>
                <!-- <td><?= h($deliveryOrder->modified) ?></td>
                <td><?= h($deliveryOrder->created) ?></td> -->
                <td><a href="/IS3102_Final/delivery-orders/edit/<?=$deliveryOrder->id?>"><i class="fa fa-edit" title="Edit Delivery Order Details"></i></a>&nbsp<?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Delivery Order')), array('action' => 'delete', $deliveryOrder->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $deliveryOrder->id))) ?></td>
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
