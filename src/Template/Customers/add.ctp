<?php
$this->assign('title', __('Customer') . '/' . __('Add'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Customers'), ['controller' => 'Customers', 'action' => 'index']);
$this->Html->addCrumb(__('Create New Customer'));
?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="box-title"><?= __('Create New Customer') ?></h3>
          </div>
          <div class="main" style="padding: 10px 20px;">

            <form method="post" accept-charset="utf-8" action="/IS3102_Final/customers/add">
              <div style="display:none;">
                <input type="hidden" name="_method" value="POST">
              </div>
              <div class ="form-group">          
                <div class="input-group" title="Enter First Name*">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input class = "form-control" type="text" placeholder = "First Name*" name="first_name" required="required" id="first_name" maxlength="255"> 
                </div>
              </div>
              <div class ="form-group">
                <div class="input-group" title="Enter Last Name*">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input class = "form-control" type="text" placeholder = "Last Name*" name="last_name" required="required" id="last_name" maxlength="255"> 
                </div>
              </div>
              <div class ="form-group">
                <div class="input-group" title="Enter Email*">
                  <span class="input-group-addon">@</span>
                  <input class = "form-control" type="email" placeholder = "Email*" name="email" required="required" id="email" maxlength="255"> 
                </div>
              </div>
              <div class ="form-group">
                <div class="input-group" title="Enter Contact Number*">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                  <input class = "form-control" type="text" placeholder = "Contact Number*" name="contact" required="required" id="contact" maxlength="100"> 
                </div>
              </div>
              <div class ="form-group">            
                <div class="input-group" title="Enter Address*">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                  <input class = "form-control" type="text" name="address" placeholder = "Address*" required="required" id="address" maxlength="255">
                </div> 
              </div>
              <div class ="form-group">            
                <div class="input-group" style="z-index: 2;" title="Select Customer Membership Tier*">
                  <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
                  <input type="hidden" name="cust_membership_tier_id" value="">
                  <select name="cust_membership_tier_id" id="cust_membership_tier_id" class='selectpicker form-control' title = "Select Customer Membership Tier*" data-live-search="true" required="required">
                    <?php foreach ($custMembershipTiers as $custMembershipTier): ?>
                      <option value="<?= $custMembershipTier->id ?>"><?php echo $custMembershipTier->tier_name ?></option>
                    <?php endforeach; ?>
                  </select>
                </div> 
              </div>
              <div class ="form-group">            
                <div class="input-group" style="z-index: 0;" title="Select Mailing List">
                  <input type="hidden" name="mailing_list" value="">
                  <label for="mailing-list"><input type="checkbox" name="mailing_list" value="" id="mailing-list">&nbsp;Mailing List</label>
                </div> 
              </div>

              <br>
              <div class ="row">
                <a href="/IS3102_Final/customers/index" class="btn btn-md btn-default pull-left" style="border-radius: 8px; margin:5px;">Back to Customer Index</a>
                <button class="btn btn-md btn-default pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Create Customer</button>
              </div>
              <br>
            </form>
          </div>
          <!--<div class="box-body">
              <?= $this->Form->create($customer) ?>
              <fieldset>
                  <?php
                      echo $this->Form->input('first_name');
                      echo $this->Form->input('last_name');
                      echo $this->Form->input('username');
                      echo $this->Form->input('password');
                      echo $this->Form->input('email');
                      echo $this->Form->input('contact');
                      echo $this->Form->input('address');
                      echo $this->Form->input(('confirm_password'), array('type'  =>  'password')); 
                      echo $this->Form->input('activation_status');
                      echo $this->Form->input('expiry_date', array('div' => false));
                      echo $this->Form->input('cust_membership_tier_id', ['label' => 'Customer Membership Tier'], ['options' => $custMembershipTiers]);
                      echo $this->Form->input('mailing_list');
                  ?>
              </fieldset>
              <br>
              <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
              <?= $this->Form->end() ?>
          </div>-->
        </div>
      </div>
    </div>
</section>
