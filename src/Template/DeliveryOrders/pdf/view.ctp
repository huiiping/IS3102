<?php
use Cake\ORM\TableRegistry; 
?>
<section class="content">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <style>
                table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                },  
                th {
                    text-align: left;
                    font-size: 20px;
                }
            </style>
            <header>
                <h1 style="font-size:300%;text-align:center"><u>Delivery Order</u></h1></header>
            </div>
        </div>

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
            <td><?= h($deliveryOrder->retailer_employee->first_name.' '.$deliveryOrder->retailer_employee->last_name)?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Name') ?></th>
            <td><?= h($deliveryOrder->location->name) ?></td>
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
            <td><?= h($deliveryOrder->customer->first_name.' '.$deliveryOrder->customer->last_name)?></td>
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
            <td><?= h($deliveryOrder->transaction->id)?></td>
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
                    <?= h('Item '.h($item->id))?></td>
                <?php endforeach; ?>
                </tr>
            </table>
        </div>
    </div>
</div>
</section>  