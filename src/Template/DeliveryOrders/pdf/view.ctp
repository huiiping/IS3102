        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">View Delivery Order</h4>
        </div>
        <div class="modal-body">
                    <table class="table table-bordered table-striped">
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
                            <td><?= $deliveryOrder->has('retailer_employee') ? $this->Html->link($deliveryOrder->retailer_employee->first_name.' '.$deliveryOrder->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $deliveryOrder->retailer_employee->id]) : '' ) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Company Address')?></th>
                            <td><?= $deliveryOrder->has('customer') ? $this->Html->link($deliveryOrder->customer->first_name.' '.$deliveryOrder->customer->last_name, ['controller' => 'Customers', 'action' => 'view', $deliveryOrder->customer->id]) : '' ?></td>
                        </tr>
                    </table>     
                </div>
                <div class="modal-footer">
                    <a href="/IS3102_Final/delivery-orders/view/<?=$deliveryOrder->id?>.pdf" class="btn btn-md btn-success pull-left" style="border-radius: 8px; margin:5px;">Download Delivery Order</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" pull-right>Close</button>
                </div>
                </div>