<?php
$this->assign('title', __('Report') . '/' . __('Add'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Incident Report'), ['controller' => 'reports', 'action' => 'index']);
$this->Html->addCrumb(__('Create New Incident Report'));
?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Create New Incident Report</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/reports/add">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>
            <div class ="form-group">          
              <div class="input-group" title="Enter Report Title*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                <input class = "form-control" type="text" placeholder = "Report Title*" name="title" required="required" id="title" maxlength="100"> 
              </div>
            </div>
            <div class ="form-group">            
              <div class="input-group" title="Enter Report Message*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <input class = "form-control" type="text" name="message" placeholder = "Report Message*" required="required" id="message" maxlength="255">
              </div> 
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Entity*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                <input class = "form-control" type="text" placeholder = "Entity*" name="entity" required="required" id="entity" maxlength="100"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Entity ID*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                <input class = "form-control" type="number" placeholder = "Entity ID*" name="entityID" required="required" id="entityID" min="1"> 
              </div>
            </div>
            <!-- <div class ="form-group">
              <div class="input-group" title="Enter Status*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <input class = "form-control" type="text" placeholder = "Status*" name="status" required="required" id="status" maxlength="100"> 
              </div>
            </div> -->
            <br>
            <div class ="row">
              <a href="/IS3102_Final/reports/index" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Incident Report Index</a>
              <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Save Incident Report</button>
            </div>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!--<div class="reports form large-9 medium-8 columns content">
    <?= $this->Form->create($report) ?>
    <fieldset>
        <legend><?= __('Add Report') ?></legend>
        <?php
            echo $this->Form->input('retailer_employee_id', ['options' => $retailerEmployees, 'empty' => true]);
            echo $this->Form->input('entity');
            echo $this->Form->input('entityID');
            echo $this->Form->input('title');
            echo $this->Form->input('message');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->
