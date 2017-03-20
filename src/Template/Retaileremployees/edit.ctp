<?php
$this->assign('title', __('Retailer Employee') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Employee'), ['controller' => 'RetailerEmployees', 'action' => 'index']);
$this->Html->addCrumb(__('Edit : '.$retailerEmployee->first_name.' '.$retailerEmployee->last_name));
?>

<!-- Content Header -->
<section class="content-header">
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Employee</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/retailer-employees/edit/<?=$retailerEmployee->id?>">
            <div style="display:none;">
              <input type="hidden" name="_method" value="PUT">
            </div>
            <div class ="form-group">          
              <div class="input-group" title="Enter First Name*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input class = "form-control" type="text" value = "<?=$retailerEmployee->first_name?>" name="first_name" required="required" id="first_name" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Last Name*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input class = "form-control" type="text" value = "<?=$retailerEmployee->last_name?>" name="last_name" required="required" id="last_name" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Email*">
                <span class="input-group-addon">@</span>
                <input class = "form-control" type="email" value = "<?=$retailerEmployee->email?>" name="email" required="required" id="email" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Contact Number*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input class = "form-control" type="text" value = "<?=$retailerEmployee->contact?>" name="contact" required="required" id="contact" maxlength="100"> 
              </div>
            </div>
            <div class ="form-group">            
              <div class="input-group" title="Enter Address*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input class = "form-control" type="text" name="address" value = "<?=$retailerEmployee->address?>" required="required" id="address" maxlength="255">
              </div> 
            </div>
            <br>
            <div class ="row">
              <a href="/IS3102_Final/retailer-employees/index" class="btn btn-md btn-default pull-left" style="border-radius: 8px; margin:5px;">Back to Employee Index</a>
              <button class="btn btn-md btn-default pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Edit Employee</button>
            </div>
            <br>
          </form>
        </div>
          <!--<div class="box-body">

              <?= $this->Form->create($retailerEmployee) ?>
              <fieldset>
                  <?php
                      echo $this->Form->input('username');
                      echo $this->Form->input('password');
                      echo $this->Form->input(('confirm_password'), array('type'  =>  'password'));
                      echo $this->Form->input('first_name');
                      echo $this->Form->input('last_name');
                      echo $this->Form->input('email');
                      echo $this->Form->input('contact');
                      echo $this->Form->input('address');
                      //echo $this->Form->input('activation_status');
                      //echo $this->Form->input('activation_token');
                      //echo $this->Form->input('recovery_status');
                      //echo $this->Form->input('recovery_token');
                      //Gwen: Comment this because only the manager can decide where is the employee posted to 
                      //echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true]);
                      //echo $this->Form->input('messages._ids', ['options' => $messages]);
                      //Gwen: Comment this because only the manager can decide the employee's role
                      //echo $this->Form->input('retailer_employee_roles._ids', ['options' => $retailerEmployeeRoles]);
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
