<?php
use Cake\ORM\TableRegistry; 
?>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Transfer Orders') ?></h3>
      </div>
      <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-success btn-block" title="Create New Transfer Order" href="/IS3102_Final/transfer-orders/add" >Create New Transfer Order</a>
        </div>
        <br>
        <!--<legend><h4><?= __('Search') ?></h4></legend>-->
        <form method="post" accept-charset="utf-8" action="/IS3102_Final/transfer-orders">
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
            <th scope="col"><?= $this->Paginator->sort('locationFrom') ?></th>
            <th scope="col"><?= $this->Paginator->sort('locationTo') ?></th>
            <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('supplier_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('status') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transferOrders as $transferOrder): ?>
            <tr>
                <td style="max-width: 150px;"><?= $this->Number->format($transferOrder->id) ?></td>
                <?php 
                $session = $this->request->session();
                $locations = TableRegistry::get('Locations');
                $location = $locations
                ->find()
                ->where(['id' => $transferOrder->locationFrom])
                ->extract('name');

                foreach ($location as $name){
                    $session->write('name',$name);
                }
                ?>
                <td><?= $this->Html->link($session->read('name'), ['controller' => 'Locations', 'action' => 'view', $transferOrder->locationFrom],['title' => 'View Location Details']) ?>
                </td>
                <?php 
                $location = $locations
                ->find()
                ->where(['id' => $transferOrder->locationTo])
                ->extract('name');

                foreach ($location as $name){
                    $session->write('name',$name);
                }
                ?>
                <td><?= $transferOrder->has('location') ? $this->Html->link($session->read('name'), ['controller' => 'Locations', 'action' => 'view', $transferOrder->locationTo],['title' => 'View Location Details']) : '' ?></td>
                <td style="max-width: 150px;"><?= $transferOrder->has('retailer_employee') ? $this->Html->link(__(h($transferOrder->retailer_employee->first_name.' '.$transferOrder->retailer_employee->last_name)), ['controller' => 'RetailerEmployees', 'action' => 'view', $transferOrder->retailer_employee->id],['title' => 'View Employee Details']) : '' ?></td>
                <td style="max-width: 150px;"><?= $transferOrder->has('supplier') ? $this->Html->link($transferOrder->supplier->supplier_name, ['controller' => 'Suppliers', 'action' => 'view', $transferOrder->supplier->id]) : '' ?></td>
                <td style="max-width: 150px;"><?= h($transferOrder->status) ?></td>
                <td><a href="/IS3102_Final/transfer-orders/edit/<?=$transferOrder->id?>"><i class="fa fa-edit" title="Edit Transfer Order Details"></i></a>&nbsp<?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Transfer Order')), array('action' => 'delete', $transferOrder->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $transferOrder->id))) ?></td>
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
