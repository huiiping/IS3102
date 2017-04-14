<?php
$this->assign('title', __('Retailer') . '/' . __('Add'));
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Retailers'), ['controller' => 'Retailers', 'action' => 'index']);
$this->Html->addCrumb(__('Add New Retailer'));
?>

<section class="content">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Add New Retailer</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/retailers/add">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>

            <div class ="form-group">         
              <div class="input-group" style="z-index: 2;" title="Enter Retailer - Company Name*">
                <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                <input class = "form-control" type="text" placeholder = "Enter Deliverer - Company Name*" name="retailer_name" required="required" id="retailer_name" maxlength="255"> 
              </div> 
            </div>

            <div class ="form-group">         
              <div class="input-group" style="z-index: 2;" title="Enter Retailer - Company Name*">
                <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                <textarea class = "form-control" rows="3" type="text" placeholder = "Enter Retailer Description" name="retailer_desc" id="retailer_desc" maxlength="255"></textarea>
              </div> 
            </div>

            <input type="hidden" name="account_status" value="Activated">

            <div class ="form-group">         
              <div class="input-group" style="z-index: 2">
                <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                <input class = "form-control" type="text" placeholder = "Enter Payment Term*" name="payment_term" required="required" id="payment_term" maxlength="255"> 
              </div> 
            </div>

            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon">@</span>
                <input class = "form-control" type="email" placeholder = "Enter Master Account Email*" name="retailer_email" required="required" id="retailer_email" maxlength="255"> 
              </div>
            </div>

            <div class ="form-group">            
              <div class="input-group" title="Enter Address*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input class = "form-control" type="text" name="address" placeholder = "Address*" required="required" id="address" maxlength="255">
              </div> 
            </div>

            <div class ="form-group">
              <div class="input-group" title="Enter Contact Number*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input class = "form-control" type="text" placeholder = "Contact Number*" name="contact" required="required" id="contact" maxlength="100"> 
              </div>
            </div>

            Contact Start Date:
            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input class = "form-control" type="date" placeholder = "Contact Start Date*" name="contract_start_date" required="required" id="contract_start_date"> 
              </div>
            </div>

            Contact End Date:
            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input class = "form-control" type="date" placeholder = "Contact End Date*" name="contract_end_date" required="required" id="contract_end_date"> 
              </div>
            </div>

            <div class ="form-group">         
              <div class="input-group" style="z-index: 25;" title="Select Transaction*">
                <span class="input-group-addon"><i class="fa fa-fw fa-cart-plus"></i></span>
                <select name="retailer_acc_type_id" class='selectpicker form-control' title ="Select Retailer Account Type" data-live-search="true">
                  <option label=" ">NIL</option> 
                  <?php foreach ($retailerAccTypes as $retailerAccType): ?>
                    <option value="<?= $retailerAccType->id ?>"><?php echo $retailerAccType->name ?></option>
                    

 
                  <?php endforeach; ?>
                </select>
              </div> 
            </div>
            <div class ="row">
            <a href="/IS3102_Final/retailers/index" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Retailers Index</a>
             <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Save Retailer</button>
           </div>
         </form>
       </div>
     </div>
   </div>
 </section>

            <!-- <?= $this->Form->create($retailer) ?>
            <fieldset>
              <?php
              echo $this->Form->input('retailer_name');
              echo $this->Form->input('retailer_desc', ['label'=>'Retailer Description']);
              echo $this->Form->hidden('account_status', ['value' => 'Activated']);
              echo $this->Form->input('payment_term');
              echo $this->Form->input('retailer_email', array('label' => 'Master Account Email'));
              echo $this->Form->input('address');
              echo $this->Form->input('contact');
              echo $this->Form->input('contract_start_date', array('type' => 'datetime'));
              echo $this->Form->input('contract_end_date', array('type' => 'datetime'));
              /*Gwen: these fields are only for edit
              echo $this->Form->input('num_of_users', ['label'=>'No. of Users']);
              echo $this->Form->input('num_of_warehouses', ['label'=>'No. of Warehouses']);
              echo $this->Form->input('num_of_stores', ['label'=>'No. of Stores']);
              echo $this->Form->input('num_of_product_types', ['label'=>'No. of Product Types']);*/
              echo $this->Form->input('retailer_acc_type_id', ['label'=>'Retailer Account Type'], ['options' => $retailerAccTypes]);
              ?>
            </fieldset>
            <br>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
            <?= $this->Form->end() ?> -->
