<?php
$this->assign('title', __('Retailer Employee') . '/' . __('Manager Actions'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Employee'), ['controller' => 'RetailerEmployees', 'action' => 'index']);
$this->Html->addCrumb(__('Manager Actions : '.$retailerEmployee->first_name.' '.$retailerEmployee->last_name));
?>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Role(s) of Retailer Employee</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/retailer-employees/manager_actions/<?=$retailerEmployee->id?>">
            <div style="display:none;">
              <input type="hidden" name="_method" value="PUT">
            </div>
            <style>
              .bootstrap-select>.dropdown-toggle {
                width: 405px; /*setting the width of select roles field*/
              }
              .bootstrap-select.form-control:not([class*=col-]) {
                width: 405px; /*setting the width of select roles field*/
              }
            </style>
            <div class ="form-group">            
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
                <input type="hidden" name="retailer_employee_roles[_ids]" value="">
                <select name="retailer_employee_roles[_ids][]" class='selectpicker form-control' multiple data-selected-text-format="count > 3" title = "" >
                  <?php foreach ($roles as $role): ?> <!-- run every row of retailer employee roles table -->
                    <?php if (!empty($retailerEmployee->retailer_employee_roles)): ?> <!-- check if employee has role -->
                      <?php foreach ($retailerEmployee->retailer_employee_roles as $retailerEmployeeRoles): ?> <!-- if employee has role, run every role of employee -->
                        <?php if ($retailerEmployeeRoles->role_name == $role->role_name): ?> <!-- if it is the employee's role -->
                          <option selected="selected" value="<?= $role->id ?>"><?php echo $role->role_name ?></option> <!-- select and print option -->
                          <?php break; ?> <!-- and break the loop -->
                        <?php endif; ?>
                      <?php endforeach; ?> 
                      <?php if (!($retailerEmployeeRoles->role_name == $role->role_name)): ?> <!-- if it is not the employee's role -->
                        <option value="<?= $role->id ?>"><?php echo $role->role_name ?></option> <!-- print option -->
                      <?php endif; ?>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div> 
            </div>
            <br>
            <div class ="row">
              <a href="/IS3102_Final/retailer-employees/index" class="btn btn-md btn-default pull-left" style="border-radius: 8px; margin:5px;">Back to Employee Index</a>
              <button class="btn btn-md btn-default pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Edit Employee Role(s)</button>
            </div>
            <br>
          </form>
        </div>

          <!--<div class="box-body">
              <?= $this->Form->create($retailerEmployee) ?>
              <fieldset>
                  <?php
                      echo $this->Form->input('username', array('readonly'=> 'readonly'));
                      echo $this->Form->input('password', array('readonly'=> 'readonly'));
                      echo $this->Form->input('first_name', array('readonly'=> 'readonly'));
                      echo $this->Form->input('last_name', array('readonly'=> 'readonly'));
                      echo $this->Form->input('email', array('readonly'=> 'readonly'));
                      echo $this->Form->input('address', array('readonly'=> 'readonly'));
                      echo $this->Form->input('contact', array('readonly'=> 'readonly'));
                      echo $this->Form->input('activation_status',['options' => ['Activated' => 'Activated', 'Banned' => 'Banned', 'Deactivated' => 'Deactivated', 'Terminated' => 'Terminated']]);
                      //echo $this->Form->input('activation_token');
                      //echo $this->Form->input('recovery_status');
                      //echo $this->Form->input('recovery_token');
                      echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true]);
                      //Gwen: Need to double check messages
                      //echo $this->Form->input('messages._ids', ['options' => $messages]);
                      echo $this->Form->input('retailer_employee_roles._ids', ['options' => $retailerEmployeeRoles]);
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
