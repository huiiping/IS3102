<?php
use Cake\ORM\TableRegistry; 
?>
<div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h3 class="modal-title" id="myModalLabel">View Delivery Order</h3>
  </div>
  <div class="modal-body">
    <label><h4 style="color:blue;">Shipped From:</h4></label>
    <table class="table table-bordered">
        <tr>
            <th scope="row"><?= __('Delivery ID') ?></th>
            <td><?= $this->Number->format($deliveryOrder->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Name') ?></th>
            <td><?= h($deliveryOrder->deliverer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deliverer') ?></th>
            <td><?= $deliveryOrder->has('retailer_employee') ? $this->Html->link($deliveryOrder->retailer_employee->first_name.' '.$deliveryOrder->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $deliveryOrder->retailer_employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Name') ?></th>
            <td><?= $deliveryOrder->has('location') ? $this->Html->link($deliveryOrder->location->name, ['controller' => 'Locations', 'action' => 'view', $deliveryOrder->location->id]) : '' ?></td>
        </tr>  
        <tr>
            <th scope="row"><?= __('Location Address') ?></th>
            <td><?= h($deliveryOrder->location->address) ?></td>
        </tr>                       
    </table>
    <label><h4 style="color:blue;">Shipper To:</h4></label>
    <table class="table table-bordered">
        <tr>
            <th scope="row"><?= __('Customer Name')?></th>
            <td><?= $deliveryOrder->has('customer') ? $this->Html->link($deliveryOrder->customer->first_name.' '.$deliveryOrder->customer->last_name, ['controller' => 'Customers', 'action' => 'view', $deliveryOrder->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer Address')?></th>
            <td><?= h($deliveryOrder->customer->address) ?></td>
        </tr>
    </table>
    <label><h4 style="color:blue;">Shipment Details:</h4></label>
    <table class="table table-bordered">
        <tr>
            <th scope="row"><?= __('Transaction ID')?></th>
            <td><?= $deliveryOrder->has('transaction') ? $this->Html->link($deliveryOrder->transaction->id, ['controller' => 'Transactions', 'action' => 'view', $deliveryOrder->transaction->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delivery Date')?></th>
            <td><?= h($deliveryOrder->delivery_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delivery Fee')?></th>
            <td><?= h($deliveryOrder->fee) ?></td>
        </tr>
    </table> 
    <table class="table table-bordered table-striped">
        <!-- add transaction items here -->
        <tr>
            <th scope="row"><?= __('Transaction items')?></th>
            <?php foreach ($deliveryOrder->items as $item): ?>
                <tr>
                    <td>
                    <?= $this->Html->link(__('Item '.h($item->id)), ['controller' => 'Items', 'action' => 'view', $item->id]) ?>
                    </td>

                <?php endforeach; ?>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <a href="/IS3102_Final/delivery-orders/view/<?=$deliveryOrder->id?>.pdf" class="btn btn-md btn-success pull-left" style="border-radius: 8px; margin:5px;">Download Delivery Order</a>
            <button type="button" class="btn btn-primary" data-dismiss="modal" pull-right>Close</button>
        </div>
    </div>