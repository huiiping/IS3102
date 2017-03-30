<?php
use Cake\ORM\TableRegistry; 
?>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Create New Transfer Order</h3>
        </div>
    </div>
    <div class="main" style="padding: 10px 20px;">

      <form id = "feedbackForm" method="post" accept-charset="utf-8" action="/IS3102_Final/transfer-orders/add">
        <div style="display:none;">
          <input type="hidden" name="_method" value="POST">
      </div>

      <div class ="form-group">            
          <div class="input-group" style="z-index: 5;" title="Select Location To*">
            <span class="input-group-addon"><i class="fa fa-fw fa-location-arrow"></i></span>
            <input type="hidden" name="locationTo" value="">
            <select name="locationTo" class='selectpicker form-control' title ="Select Location To*" data-live-search="true" required="required">
              <?php foreach ($locations as $location): 
              $session = $this->request->session();
              $allLocations = TableRegistry::get('Locations');
              $allLocation = $allLocations
              ->find()
              ->where(['id' => $location])
              ->extract('name');

              foreach ($allLocation as $name){
                $session->write('name',$name);
            }
            ?>
            <option value="<?= $location?>"><?php echo $session->read('name')?></option> 
        <?php endforeach; ?>
    </select>
</div> 
</div>

<div class ="form-group">            
  <div class="input-group" style="z-index: 2;" title="Select Location From*">
    <span class="input-group-addon"><i class="fa fa-fw fa-location-arrow"></i></span>
    <input type="hidden" name="locationFrom" value="">
    <select name="locationFrom" class='selectpicker form-control' title ="Select Location From*" data-live-search="true" required="required">
        <?php foreach ($locations as $location): 
        $session = $this->request->session();
        $allLocations = TableRegistry::get('Locations');
        $allLocation = $allLocations
        ->find()
        ->where(['id' => $location])
        ->extract('name');

        foreach ($allLocation as $name){
            $session->write('name',$name);
        }
        ?>
        <option value="<?= $location?>"><?php echo $session->read('name')?></option> 
    <?php endforeach; ?>
</select>
</div> 
</div>

<div class ="form-group">
    <div class="input-group" title="Enter Remarks*">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
        <textarea rows="5" class = "form-control" type="textarea" name="remarks" required="required" placeholder = "Remarks*" id="remarks"></textarea>
    </div>
</div>

<div class ="form-group">            
  <div class="input-group" style="z-index: 10;" title="Select Retailer Employee (Receiver)">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input type="hidden" name="retailer_employee_id" value="">
    <select name="retailer_employee_id" class='selectpicker form-control' title ="Select Retailer Employee (Receiver)" data-live-search="true">
      <?php foreach ($retailerEmployees as $retailerEmployeeID): 
      $session = $this->request->session();
      $retailerEmployees = TableRegistry::get('RetailerEmployees');
      $firstNames = $retailerEmployees
      ->find()
      ->where(['id' => $retailerEmployeeID])
      ->extract('first_name');

      foreach ($firstNames as $firstName){
        $session->write('firstNames',$firstName);
    }

    $lastNames = $retailerEmployees
    ->find()
    ->where(['id' => $retailerEmployeeID])
    ->extract('last_name');

    foreach ($lastNames as $lastName){
        $session->write('lastNames',$lastName);
    }
    ?>
    <option value="<?= $retailerEmployeeID?>"><?php echo $session->read('firstNames').' '.$session->read('lastNames')?></option> 
<?php endforeach; ?>
</select>
</div> 
</div>

<div class ="form-group">            
  <div class="input-group" style="z-index: 8;" title="Select Supplier (Receiver)">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input type="hidden" name="supplier_id" value="">
    <select name="supplier_id" class='selectpicker form-control' title ="Select Supplier (Receiver)" data-live-search="true">
      <?php foreach ($suppliers as $supplier): 
      $session = $this->request->session();
      $allSuppliers= TableRegistry::get('Suppliers');
      $allSupplier = $allSuppliers
      ->find()
      ->where(['id' => $supplier])
      ->extract('supplier_name');

      foreach ($allSupplier as $name){
        $session->write('supName',$name);
    }
    ?>
    <option value="<?= $supplier?>"><?php echo $session->read('supName')?></option>
<?php endforeach; ?>
</select>
</div> 
</div>

<div class ="form-group">            
<div class="input-group" style="z-index: 5;" title="Select Item(s)*">
      <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
      <input type="hidden" name="items[_ids]" value="">
      <select name="items[_ids][]" class='selectpicker form-control' data-live-search="true" multiple data-selected-text-format="count > 3" title = "Select Item(s)*" required="required" >
        <?php foreach ($items as $item): ?>
          <option value="<?= $item->id ?>"><?php echo $item->name ?></option>
      <?php endforeach; ?>
  </select>
</div> 
</div>

<input class = "hidden" type="text" name="status" required="required" id="status" value="Pending"> 

<div class ="row">
    <a href="/IS3102_Final/transfer-orders/index" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Transfer Orders Index</a>
    <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Save Transfer Order</button>
</div>
</div>
</div>
</div>
</div>
</section>
