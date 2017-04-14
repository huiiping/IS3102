<?php
$this->assign('title', __('Retailer') ); 
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']); 
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Retailers', 'action' => 'index']);
$this->Html->addCrumb(__("Retailer's Details"), ['controller' => 'Retailers', 'action' => 'view', $retailer[0]['id']]);
$this->Html->addCrumb(__("Retailer's Loyalty Points"), ['controller' => 'RetailerLoyaltyPoints', 'action' => 'view', $retailer[0]['id']]); 
$this->Html->addCrumb(__('Award / Deduct Loyalty Points')); ?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Award / Deduct Loyalty Points</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/RetailerLoyaltyPoints/addSpecific/<?=$retailer[0]['id']?>">
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
                <input class = "form-control" type="number" placeholder = "Loyalty Points to Deduct" name="redemption_pts" id="redemption_pts" min="0"> 
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
              <a href="/IS3102_Final/RetailerLoyaltyPoints/view/<?=$retailer[0]['id']?>" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Loyalty Points Page</a>
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
                      $session = $this->request->session();
                      echo $this->Form->input('loyalty_pts', ['label'=>'Loyalty Points']);
                      echo $this->Form->input('redemption_pts');
                      echo $this->Form->input('remarks');
                      echo $this->Form->hidden('retailer_id', ['value' => $retailer[0]['id']]);
                      echo $this->Form->hidden('intrasys_employee_id', ['value'=>$session->read('employee_id')]);
                  ?>
              </fieldset>
              <br>
              <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
              <?= $this->Form->end() ?>-->
