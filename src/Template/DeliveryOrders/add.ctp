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
            <h3 class="panel-title">Create New Delivery Order</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/delivery-orders/add">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>

            <div class ="form-group">         
              <div class="input-group" style="z-index: 2;" title="Enter Deliverer - Company Name*">
                <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                <input class = "form-control" type="text" placeholder = "Enter Deliverer - Company Name*" name="deliverer" required="required" id="deliverer" maxlength="255"> 
              </div> 
            </div>

            <?php //Get the employee ID - do an automatically select $session = $this->request->session(); ?>

          <div class ="form-group">         
            <div class="input-group" style="z-index: 35;" title="Select Deliverer - Person handling this delivery.">
              <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
              <input type="hidden" name="retailer_employee_id" value="">
              <select name="retailer_employee_id" class='selectpicker form-control' title ="Select Deliverer - Person handling this delivery." data-live-search="true">
                <option label=" ">NIL</option> 
                <?php foreach ($retailerEmployees as $retailerEmployee): 
                $session = $this->request->session();
                $retailerEmployees = TableRegistry::get('RetailerEmployees');
                $RE = $retailerEmployees
                ->find()
                ->where(['id' => $retailerEmployee])
                ->extract('first_name');

                foreach ($RE as $firstName){
                  $session->write('firstNames',$firstName);
                }

                $lastNames = $retailerEmployees
                ->find()
                ->where(['id' => $retailerEmployee])
                ->extract('last_name');

                foreach ($lastNames as $lastName){
                  $session->write('lastNames',$lastName);
                }
                ?>

                <option value="<?= $retailerEmployee?>"><?php echo $session->read('firstNames').' '.$session->read('lastNames')?></option> 
              <?php endforeach; ?>
            </select>
          </div> 
        </div>

        <div class ="form-group">         
          <div class="input-group" style="z-index: 30;" title="Select Receiver - Customer receiving the goods.">
            <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
            <input type="hidden" name="customer_id" value="">
            <select name="customer_id" class='selectpicker form-control' title ="Select Receiver - Customer receiving the goods." data-live-search="true">
              <option label=" ">NIL</option> 
              <?php foreach ($customers as $customer):

              $session = $this->request->session();
              $allCustomers = TableRegistry::get('Customers');
              $allCustomer = $allCustomers
              ->find()
              ->where(['id' => $customer])
              ->extract('member_identification');

              foreach ($allCustomer as $name){
                $session->write('memID', $name);
              }
              ?>
              <option value="<?= $customer?>"><?php echo $session->read('memID')?></option>
            <?php endforeach; ?>
          </select>
        </div> 
      </div>

      <div class ="form-group">         
        <div class="input-group" style="z-index: 25;" title="Select Transaction*">
          <span class="input-group-addon"><i class="fa fa-fw fa-cart-plus"></i></span>
          <input type="hidden" name="transaction_id" value="">
          <select name="transaction_id" class='selectpicker form-control' title ="Select Transaction*" data-live-search="true">
            <option label=" ">NIL</option> 
            <?php foreach ($transactions as $transaction): ?>
              <option><?php echo $transaction ?></option> 
            <?php endforeach; ?>
          </select>
        </div> 
      </div>

      <div class ="form-group">         
        <div class="input-group" style="z-index: 20;" title="Select Delivery Date*">
          <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
          <input type="hidden" name="delivery_date" value="">
          <input class = "form-control" type="date" name="delivery_date" placeholder = "Select Delivery Date*" required=required id="delivery_date" maxlength="255">
        </div> 
      </div>

      <div class ="form-group">        
        <div class="input-group" style="z-index: 10;" title="Select Location - Supplying the goods.">
          <span class="input-group-addon"><i class="fa fa-fw fa-location-arrow"></i></span>
          <input type="hidden" name="location_id" value="">
          <select name="location_id" class='selectpicker form-control' title ="Select Location - Supplying the goods." data-live-search="true">
            <option label=" ">NIL</option> 
            <?php foreach ($locations as $location): ?>
              <option><?php echo $location ?></option> 
            <?php endforeach; ?>
          </select>
        </div> 
      </div>

      <div class ="form-group">         
        <div class="input-group" title="Enter Delivery Fee">
          <span class="input-group-addon"><i class="fa fa-fw fa-money"></i></span>
          <input type="hidden" name="fee" value="">
          <input class = "form-control" type="number" name="fee" placeholder = "Enter Delivery Fee" id="fee" maxlength="255">
        </div> 
      </div>

      <input class = "hidden" type="text" name="status" required="required" id="status" value="Pending">

      <div class ="row">
       <a href="/IS3102_Final/delivery-orders/index" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Delivery Order Index</a>
       <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Add Delivery Order Items</button>
     </div>
   </form>
 </div>
</div>
</div>
</section>
