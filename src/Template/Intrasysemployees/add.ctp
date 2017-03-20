<?php
$this->assign('title', __('Intrasys Employees') . '/' . __('Add'));
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Employees'), ['controller' => 'intrasys-employees', 'action' => 'index']);
$this->Html->addCrumb(__('Create New Employee'));
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Create New Intrasys Employee</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/intrasys-employees/add">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>
            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input class = "form-control" type="text" placeholder = "First Name*" name="first_name" required="required" id="first_name" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input class = "form-control" type="text" placeholder = "Last Name*" name="last_name" required="required" id="last_name" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon">@</span>
                <input class = "form-control" type="email" placeholder = "Email*" name="email" required="required" id="email" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input class = "form-control" type="text" placeholder = "Contact Number*" name="contact" required="required" id="contact" maxlength="100"> 
              </div>
            </div>
            <div class ="form-group">            
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input class = "form-control" type="text" name="address" placeholder = "Address*" required="required" id="address" maxlength="255">
              </div> 
            </div>
            <div class ="form-group">            
              <div class="input-group" style="z-index: 999999999;">
                <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
                <input type="hidden" name="intrasys_employee_roles[_ids]" value="">
                <select name="intrasys_employee_roles[_ids][]" class='selectpicker form-control' data-live-search="true" multiple data-selected-text-format="count > 3" title = "Select Employee Role(s)*">
                  <?php foreach ($intrasysEmployeeRoles as $intrasysEmployeeRole): ?>
                    <option value="<?= $intrasysEmployeeRole->id ?>"><?php echo $intrasysEmployeeRole->role_name ?></option>
                  <?php endforeach; ?>
                </select>
              </div> 
            </div>
            <br>
            <div class ="row">
              <a href="/IS3102_Final/intrasys-employees/index" class="btn btn-md btn-default pull-left" style="border-radius: 8px; margin:5px;">Back to Employee Index</a>
              <button class="btn btn-md btn-default pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Create Employee</button>
            </div>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
