<?php
$this->assign('title', __('Intrasys Employees') . '/' . __('Edit'));
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Employees'), ['controller' => 'intrasys-employees', 'action' => 'index']);
$this->Html->addCrumb(__('Edit : '.$intrasysEmployee->first_name.' '.$intrasysEmployee->last_name));
?>

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

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/intrasys-employees/edit/<?=$intrasysEmployee->id?>">
            <div style="display:none;">
              <input type="hidden" name="_method" value="PUT">
            </div>
            <div class ="form-group">          
              <div class="input-group" title="Enter First Name*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input class = "form-control" type="text" value = "<?=$intrasysEmployee->first_name?>" name="first_name" required="required" id="first_name" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Last Name*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input class = "form-control" type="text" value = "<?=$intrasysEmployee->last_name?>" name="last_name" required="required" id="last_name" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Email*">
                <span class="input-group-addon">@</span>
                <input class = "form-control" type="email" value = "<?=$intrasysEmployee->email?>" name="email" required="required" id="email" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Contact Number*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input class = "form-control" type="text" value = "<?=$intrasysEmployee->contact?>" name="contact" required="required" id="contact" maxlength="100"> 
              </div>
            </div>
            <div class ="form-group">            
              <div class="input-group" title="Enter Address*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input class = "form-control" type="text" name="address" value = "<?=$intrasysEmployee->address?>" required="required" id="address" maxlength="255">
              </div> 
            </div>
            <br>
            <div class ="row">
              <a href="/IS3102_Final/intrasys-employees/index" class="btn btn-md btn-default pull-left" style="border-radius: 8px; margin:5px;">Back to Employee Index</a>
              <button class="btn btn-md btn-default pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Edit Employee</button>
            </div>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
