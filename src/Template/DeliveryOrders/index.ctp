<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?php
$this->assign('title', __('Delivery Order') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Delivery Orders'));
?>

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
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/delivery-orders">
            <table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
              <tr>
                <th width="10"></th>
                <th scope="col">
                  <div class ="form-group">
                    <div class="input-group">
                      <label for="search"></label>&nbsp&nbsp&nbsp
                      <input class = "form-control" type="text" class="btn btn-default btn-block" name="search" id="search" placeholder="Search">
                    </div>
                  </div>
                </th>
                <th width="30"></th>
                <th scope="col" class ="form-group">
                  <div class ="submit">
                    <input class="btn btn-primary btn-block" class = "form-control" type="submit" class="btn btn-default bth-block" value="Search">

                  </div>
                </th>
                <th width="10"></th>
                <th scope="col" class ="form-group">
                  <div class ="submit">
                    <button class="btn btn-default btn-block"><a class="reset_button" onclick="reset();" placeholder="Reset"><i class="fa fa-fw fa-undo"></i>Reset</a></button>
                  </div>
                </th>
              </tr>
            </table>
          </form>
          <br>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th scope="col"><?= $this->Paginator->sort('deliverer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transaction_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>


              <?php foreach ($deliveryOrders as $deliveryOrder): ?>
                <tr>
                  <td style="max-width: 150px;"><?= h($deliveryOrder->deliverer) ?></td>
                  <td style="max-width: 150px;"><?= $deliveryOrder->has('retailer_employee') ? $this->Html->link($deliveryOrder->retailer_employee->first_name.' '.$deliveryOrder->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $deliveryOrder->retailer_employee->id]) : '' ?></td>
                  <td style="max-width: 150px;"><?= $deliveryOrder->has('location') ? $this->Html->link($deliveryOrder->location->name, ['controller' => 'Locations', 'action' => 'view', $deliveryOrder->location->id]) : '' ?></td>
                  <td style="max-width: 150px;"><?= $deliveryOrder->has('customer') ? $this->Html->link($deliveryOrder->customer->id, ['controller' => 'Customers', 'action' => 'view', $deliveryOrder->customer->id]) : '' ?></td>
                  <td style="max-width: 150px;"><?= $deliveryOrder->has('transaction') ? $this->Html->link($deliveryOrder->transaction->id, ['controller' => 'Transactions', 'action' => 'view', $deliveryOrder->transaction->id]) : '' ?></td>
                  <td>
                    <?php 
                    if($deliveryOrder->status == 'Pending'){
                      ?>
                      <div class="btn-group">
                        <button type="button" style="width: 100px;" class="btn btn-danger btn-flat"><?= h($deliveryOrder->status) ?></button>
                        <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a title="Delivered" href="/IS3102_Final/delivery-orders/deliveredStatus/<?= $deliveryOrder->id ?>">Delivered</a></li>
                          <li><a title="Approved" href="/IS3102_Final/delivery-orders/approvedStatus/<?= $deliveryOrder->id ?>">Approved</a></li>
                        </ul>
                      </div>
                      <?php

                    } else if ($deliveryOrder->status == 'Delivered'){
                      ?>

                      <div class="btn-group">
                        <button type="button" style="width: 100px;" class="btn btn-success btn-flat"><?= h($deliveryOrder->status) ?></button>
                      </div>

                      <?php
                    } else { ?>
                      <div class="btn-group">
                        <button type="button" style="width: 100px;" class="btn btn-warning btn-flat"><?= h($deliveryOrder->status) ?></button>
                        <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a title="Pending Feedback" href="/IS3102_Final/delivery-orders/pendingStatus/<?= $deliveryOrder->id ?>">Pending</a></li>
                          <li><a title="Approved Feedback" href="/IS3102_Final/delivery-orders/deliveredStatus/<?= $deliveryOrder->id ?>">Delivered</a></li>
                        </ul>
                      </div>
                      <?php }
                      ?>
                    </td>
                    <td style="max-width: 150px;"><span style="cursor:pointer"><a href=#> <i class="fa fa-bars" data-toggle="modal" data-target="#myModal" href="/IS3102_Final/delivery-orders/view/<?=$deliveryOrder->id?>" title="View Delivery Order Details"></i></span>&nbsp&nbsp
                      <?php if($deliveryOrder->status == 'Pending'): ?>
                      <a href="/IS3102_Final/delivery-orders/edit/<?=$deliveryOrder->id?>"><i class="fa fa-edit" title="Edit Delivery Order Details"></i></a>&nbsp&nbsp
                      <?php endif; ?>
                      <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Delivery Order')), array('action' => 'delete', $deliveryOrder->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $deliveryOrder->id))) ?></td>
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

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

        </div>
      </div>
    </div>
