<?php
use Cake\ORM\TableRegistry; 
?>
<?php
$this->assign('title', __('Delivery Order') . '/' . __('Add'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Delivery Order'), ['controller' => 'delivery-orders', 'action' => 'index']);
$this->Html->addCrumb(__('Create New Delivery Order'));
?>

<section class="content">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Add Delivery Order Items</h3>
        </div>
    </div>
    <div class="main" style="padding: 10px 20px;">
      <form method="post" accept-charset="utf-8" action="/IS3102_Final/delivery-orders/add2">
        <div style="display:none;">
          <input type="hidden" name="_method" value="POST">
      </div>

      <div class ="form-group">         
          <div class="input-group" style="z-index: 35;" title="Select Delivery Order Items">
            <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
            <input type="hidden" name="items[_ids]" value="">
            <select name="items[_ids][]" class='selectpicker form-control' title ="Select Delivery Order Items" multiple data-selected-text-format="count > 3" data-live-search="true">
              <?php 
              $session = $this->request->session();

              $transactionItems = TableRegistry::get('Transactions_items');
              $transactionItem = $transactionItems
              ->find()
              ->where(['transaction_id' => $deliveryOrder->transaction_id])
              ->extract('item_id');

              foreach ($transactionItem as $item): 
                $session->write('itemID',$item);
            ?>
            <option value="<?= $item?>"><?php echo $session->read('itemID')?></option> 
        <?php endforeach; ?>
    </select>
</div> 
</div>
<div class ="row">
   <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Save Items</button>
</div>
</form>
</div>
</div>
</div>
</section>