<?php
$this->assign('title', __('Transactions') . '/' . __('View'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Transactions'), ['controller' => 'Transactions', 'action' => 'index']);
$this->Html->addCrumb(__('View Transaction'));
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= 'Transaction Details (ID: '.h($transaction->id).')' ?></h3>
        </div>
        <div class="box-body">

            <table class="table table-bordered table-striped">
                <tr>
                    <th scope="row"><?= __('Status') ?></th>
                    <td><?= h($transaction->status) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Remarks') ?></th>
                    <td><?= h($transaction->remarks) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Customer') ?></th>
                    <td><?= $transaction->has('customer') ? $this->Html->link($transaction->customer->first_name.' '.$transaction->customer->last_name, ['controller' => 'Customers', 'action' => 'view', $transaction->customer->id], ['title' => 'View Customer Details']) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Retailer Employee') ?></th>
                    <td><?= $transaction->has('retailer_employee') ? $this->Html->link($transaction->retailer_employee->first_name.' '.$transaction->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $transaction->retailer_employee->id], ['title' => 'View Employee Details']) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Location') ?></th>
                    <td><?= $transaction->has('location') ? $this->Html->link($transaction->location->name, ['controller' => 'Locations', 'action' => 'view', $transaction->location->id], ['title' => 'View Location Details']) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Receipt Number') ?></th>
                    <td><?= $this->Number->format($transaction->receipt_number) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= $this->Time->format(h($transaction->modified), 'd MMM YYYY, HH:mm') ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= $this->Time->format(h($transaction->created), 'd MMM YYYY, HH:mm') ?></td>
                </tr>
            </table>
        </div>
        <div class="box-body">
            <?php if (!empty($transaction->delivery_orders)): ?>
            <h4><?= __('Related Delivery Orders') ?></h4>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Status') ?></th>
                    <th scope="col"><?= __('Fee') ?></th>
                    <th scope="col"><?= __('Currency') ?></th>
                    <th scope="col"><?= __('Deliverer') ?></th>
                    <th scope="col"><?= __('Customer Id') ?></th>
                    <th scope="col"><?= __('Retailer Employee Id') ?></th>
                    <th scope="col"><?= __('Location Id') ?></th>
                    <th scope="col"><?= __('Transaction Id') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($transaction->delivery_orders as $deliveryOrders): ?>
                <tr>
                    <td><?= h($deliveryOrders->id) ?></td>
                    <td><?= h($deliveryOrders->status) ?></td>
                    <td><?= h($deliveryOrders->fee) ?></td>
                    <td><?= h($deliveryOrders->currency) ?></td>
                    <td><?= h($deliveryOrders->deliverer) ?></td>
                    <td><?= h($deliveryOrders->customer_id) ?></td>
                    <td><?= h($deliveryOrders->retailer_employee_id) ?></td>
                    <td><?= h($deliveryOrders->location_id) ?></td>
                    <td><?= h($deliveryOrders->transaction_id) ?></td>
                    <td><?= h($deliveryOrders->modified) ?></td>
                    <td><?= h($deliveryOrders->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'DeliveryOrders', 'action' => 'view', $deliveryOrders->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'DeliveryOrders', 'action' => 'edit', $deliveryOrders->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'DeliveryOrders', 'action' => 'delete', $deliveryOrders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryOrders->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php endif; ?>
        </div>
    </div>
  </div>
</section>
