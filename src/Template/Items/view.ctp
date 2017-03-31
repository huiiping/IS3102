<!-- Main content -->
<section class="content" style="min-height: 550px">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= $item->name ?></h3>
          </div>
          <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-success btn-block" title="Edit Item Details" href="/IS3102_Final/items/edit/<?=$item->id?>">Edit Item</a>
          </div>
          <br><br><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($item->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Name') ?></th>
                    <td><?= h($item->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Description') ?></th>
                    <td><?= h($item->description) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Product') ?></th>
                    <td><?= $item->has('product') ? $this->Html->link($item->product->prod_name, ['controller' => 'Products', 'action' => 'view', $item->product->id], ['title' => 'View Product Details']) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('EPC') ?></th>
                    <td><?= h($item->EPC) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Status') ?></th>
                    <td><?= h($item->status) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Location') ?></th>
                    <td><?= $item->has('location') ? $this->Html->link($item->location->name, ['controller' => 'Locations', 'action' => 'view', $item->location->id], ['title' => 'View Location Details']) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Section') ?></th>
                    <td>
                        <?= $item->has('section') ? $this->Html->link($item->section->sec_name, ['controller' => 'Locations', 'action' => 'view', $item->location->id], ['title' => 'View Section Details']) : '' ?>
                    </td>
                </tr>
            </table>
            <br>
            <div class="related">
                <?php if (!empty($item->reports)): ?>
                <h4><?= __('Related Reports') ?></h4>
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Retailer Employee Id') ?></th>
                        <th scope="col"><?= __('Location Id') ?></th>
                        <th scope="col"><?= __('Supplier Id') ?></th>
                        <th scope="col"><?= __('Delivery Order Id') ?></th>
                        <th scope="col"><?= __('Item Id') ?></th>
                        <th scope="col"><?= __('Title') ?></th>
                        <th scope="col"><?= __('Message') ?></th>
                        <th scope="col"><?= __('Status') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                  </thead>
                    <?php foreach ($item->reports as $reports): ?>
                    <tr>
                        <td><?= h($reports->id) ?></td>
                        <td><?= h($reports->retailer_employee_id) ?></td>
                        <td><?= h($reports->location_id) ?></td>
                        <td><?= h($reports->supplier_id) ?></td>
                        <td><?= h($reports->delivery_order_id) ?></td>
                        <td><?= h($reports->item_id) ?></td>
                        <td><?= h($reports->title) ?></td>
                        <td><?= h($reports->message) ?></td>
                        <td><?= h($reports->status) ?></td>
                        <td><?= h($reports->modified) ?></td>
                        <td><?= h($reports->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Reports', 'action' => 'view', $reports->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Reports', 'action' => 'edit', $reports->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reports', 'action' => 'delete', $reports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reports->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
            <br>
            <div class="related">
                <?php if (!empty($item->delivery_order_items)): ?>
                <h4><?= __('Related Delivery Order Items') ?></h4>
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th scope="col"><?= __('Delivery Order Id') ?></th>
                        <th scope="col"><?= __('Item Id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                  </thead>
                    <?php foreach ($item->delivery_order_items as $deliveryOrderItems): ?>
                    <tr>
                        <td><?= h($deliveryOrderItems->delivery_order_id) ?></td>
                        <td><?= h($deliveryOrderItems->item_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'DeliveryOrderItems', 'action' => 'view', $deliveryOrderItems->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'DeliveryOrderItems', 'action' => 'edit', $deliveryOrderItems->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'DeliveryOrderItems', 'action' => 'delete', $deliveryOrderItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryOrderItems->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
            <br>
            <div class="related">
                <?php if (!empty($item->feedbacks)): ?>
                <h4><?= __('Related Feedbacks') ?></h4>
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Customer Id') ?></th>
                        <th scope="col"><?= __('Customer First Name') ?></th>
                        <th scope="col"><?= __('Customer Last Name') ?></th>
                        <th scope="col"><?= __('Customer Contact') ?></th>
                        <th scope="col"><?= __('Customer Email') ?></th>
                        <th scope="col"><?= __('Message') ?></th>
                        <th scope="col"><?= __('Status') ?></th>
                        <th scope="col"><?= __('Product Id') ?></th>
                        <th scope="col"><?= __('Item Id') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                  </thead>
                    <?php foreach ($item->feedbacks as $feedbacks): ?>
                    <tr>
                        <td><?= h($feedbacks->id) ?></td>
                        <td><?= h($feedbacks->customer_id) ?></td>
                        <td><?= h($feedbacks->customer_first_name) ?></td>
                        <td><?= h($feedbacks->customer_last_name) ?></td>
                        <td><?= h($feedbacks->customer_contact) ?></td>
                        <td><?= h($feedbacks->customer_email) ?></td>
                        <td><?= h($feedbacks->message) ?></td>
                        <td><?= h($feedbacks->status) ?></td>
                        <td><?= h($feedbacks->product_id) ?></td>
                        <td><?= h($feedbacks->item_id) ?></td>
                        <td><?= h($feedbacks->modified) ?></td>
                        <td><?= h($feedbacks->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Feedbacks', 'action' => 'view', $feedbacks->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Feedbacks', 'action' => 'edit', $feedbacks->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Feedbacks', 'action' => 'delete', $feedbacks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feedbacks->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
            <br>
            <div class="related">
                <?php if (!empty($item->transaction_items)): ?>
                <h4><?= __('Related Transaction Items') ?></h4>
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th scope="col"><?= __('Transaction Id') ?></th>
                        <th scope="col"><?= __('Item Id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                  </thead>
                    <?php foreach ($item->transaction_items as $transactionItems): ?>
                    <tr>
                        <td><?= h($transactionItems->transaction_id) ?></td>
                        <td><?= h($transactionItems->item_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'TransactionItems', 'action' => 'view', $transactionItems->transaction_id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'TransactionItems', 'action' => 'edit', $transactionItems->transaction_id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'TransactionItems', 'action' => 'delete', $transactionItems->transaction_id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactionItems->transaction_id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
            <br>
            <div class="related">
                <?php if (!empty($item->transfer_order_items)): ?>
                <h4><?= __('Related Transfer Order Items') ?></h4>
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th scope="col"><?= __('Transfer Order Id') ?></th>
                        <th scope="col"><?= __('Item Id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                  </thead>
                    <?php foreach ($item->transfer_order_items as $transferOrderItems): ?>
                    <tr>
                        <td><?= h($transferOrderItems->transfer_order_id) ?></td>
                        <td><?= h($transferOrderItems->item_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'TransferOrderItems', 'action' => 'view', $transferOrderItems->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'TransferOrderItems', 'action' => 'edit', $transferOrderItems->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'TransferOrderItems', 'action' => 'delete', $transferOrderItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferOrderItems->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>