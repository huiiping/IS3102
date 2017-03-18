<?php
$this->assign('title', __('RFQ') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('RFQ'), ['controller' => 'Rfqs', 'action' => 'index']);
$this->Html->addCrumb(__('Edit : '.$rfq->title));
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
            <h3 class="panel-title">Edit RFQ</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/rfqs/edit/<?=$rfq->id?>">
            <div style="display:none;">
              <input type="hidden" name="_method" value="PUT">
            </div>
            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon">Title</span>
                <input class = "form-control" type="text" value = "<?=$rfq->title?>" name="title" required="required" id="title" maxlength="100"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon">Message</span>
                <textarea name="message" required="required" id="remarks" rows="4" cols="75"><?=$rfq->message?></textarea>
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon">End Date</span>
                <input class = "form-control" type="datetime" value = "<?=$rfq->end_date?>" name="end_date" required="required" id="end_date"> 
              </div>
            </div>
            
            <br>
            <div class ="row">
              <a href="/IS3102_Final/rfqs/index" class="btn btn-md btn-default pull-left" style="border-radius: 8px; margin:5px;">Back to RFQ Index</a>
              <button class="btn btn-md btn-default pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Edit RFQ</button>
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
