<?php
$this->assign('title', __('Retailer') );
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Company Profile'), ['controller' => 'RetailerDetails', 'action' => 'index']);
$this->Html->addCrumb(__('Loyalty Points'), ['controller' => 'RetailerLoyaltyPoints', 'action' => 'retailer-view', $retailer[0]['id']]);
$this->Html->addCrumb(__('Redeem Loyalty Points')); 
?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Redeem Loyalty Points</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/RetailerLoyaltyPoints/redeem">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Points to Redeem*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-inbox"></i></span>
                <input class = "form-control" type="number" placeholder = "Loyalty Points to Redeem (e.g. 300 or 600)*" name="redemption_pts" required="required" id="redemption_pts" min="0"> 
              </div>
            </div>
            <br>
            <div class ="row">
              <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Redeem Points</button>
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
                    //echo $this->Form->input('loyalty_pts', array('disabled'=>'disabled', 'label'=>'Loyalty Points'));
                    echo $this->Form->input('redemption_pts', array('label'=>'Redemption Points'));
                  ?>
              </fieldset>
              <br>
              <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
              <?= $this->Form->end() ?>-->
