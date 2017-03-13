<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?php if($loggedIn) : ?>
  <?= $this->Element('intrasysLeftSideBar'); ?>
<?php endif; ?>

<!-- Main Content -->
<div class="content-wrapper">
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
              <div class="form-group">
                <div class="input-group">
                  <label>Intrasys Employee Roles</label><br>
                  <input type="hidden" name="intrasys_employee_roles[_ids]" value="">
                  <select name="intrasys_employee_roles[_ids][]" multiple="multiple">
                  <?php foreach ($intrasysEmployeeRoles as $intrasysEmployeeRole): ?>
                    <option value="<?= $intrasysEmployeeRole->id ?>"><?php echo $intrasysEmployeeRole->role_name ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <br>
              <div class ="form-group" align="right">            
                <div class="input-group">
                  <a href="/IS3102_Final/intrasys-employees/index" class="btn btn-md btn-primary pull-right" style="border-radius: 8px; margin:5px;">Back to Employee Index</a>
                  <button class="btn btn-md btn-primary pull-right" type="submit" style="border-radius: 8px; margin:5px;">Add Employee</button>
                </div> 
              </div>
              </form>

              <!--<?= $this->Form->create($intrasysEmployee) ?>
              <fieldset>
                <?php
                /*echo $this->Form->input('first_name');
                echo $this->Form->input('last_name');
                        //echo $this->Form->input('activation_status');
                        //echo $this->Form->input('activation_token');
                        //echo $this->Form->input('recovery_status');
                        //echo $this->Form->input('recovery_token');
                        //echo $this->Form->input('username');
                        //echo $this->Form->input('password');
                        //echo $this->Form->input(('confirm_password'), array('type'  =>  'password')); 
                echo $this->Form->input('email');
                echo $this->Form->input('contact');
                echo $this->Form->input('address');*/
                echo $this->Form->input('intrasys_employee_roles._ids', ['options' => $intrasysEmployeeRoles]);
                ?>
              </fieldset>
            </form>
            <br>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
            <?= $this->Form->end() ?>-->

          </div>
        </div>
      </div>
    </div>
  </section>
</div>
