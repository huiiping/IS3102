<?php
$this->assign('title', __('Retailer') ); 
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']); 
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Retailers', 'action' => 'index']);
$this->Html->addCrumb(__('Mass Send Loyalty Points')); ?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Mass Send Loyalty Points</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/RetailerLoyaltyPoints/add">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Points to Award">
                <span class="input-group-addon"><i class="fa fa-trophy"></i></span>
                <input class = "form-control" type="number" placeholder = "Loyalty Points to Award" name="loyalty_pts" id="loyalty_pts" min="0"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Points to Deduct">
                <span class="input-group-addon"><i class="fa fa-trophy"></i></span>
                <input class = "form-control" type="number" placeholder = "Loyalty Points to Redeem" name="redemption_pts" id="redemption_pts" min="0"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Remarks">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <input class = "form-control" type="text" placeholder = "Remarks" name="remarks" id="remarks"> 
              </div>
            </div>
            <br>
            <div class ="row">
              <a href="/IS3102_Final/retailers/index" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Retailer Index</a>
              <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Save Points</button>
            </div>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

              <!--<?= $this->Form->create($retailerLoyaltyPoint) ?>
              <fieldset>
                  <?php
                      echo $this->Form->input('loyalty_pts', ['label'=>'Loyalty Points']);
                      echo $this->Form->input('redemption_pts');
                      echo $this->Form->input('remarks');
                      echo $this->Form->input('retailer_id', ['options' => $retailers]);
                      //echo $this->Form->hidden('intrasys_employee_id', ['value'=>$session->read('employee_id')]);
                  ?>
              </fieldset>
              <br>
              <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
              <?= $this->Form->end() ?>-->
