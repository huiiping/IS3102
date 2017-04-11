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
            <input type="hidden" name="redemption_pts" id="redemption_pts" value="300">
            <div class ="form-group">
              <div class="input-group" title="Select Award to Redeem*">
                <span class="input-group-addon"><i class="fa fa-trophy"></i></span>
                <input type="hidden" name="award" id="award" value=""> 
                  <select  name="award" id="award" class="selectpicker form-control" title="Select Award to Redeem*" required>
                    <option value="user"><?php echo 'Free User' ?></option>
                    <option value="warehouse"><?php echo 'Free Warehouse' ?></option>
                    <option value="store"><?php echo 'Free Store' ?></option>
                    <option value="product"><?php echo 'Free Product' ?></option>
                  </select>
              </div>
            </div>
            <br>
            <div class ="row">
              <a href="/IS3102_Final/retailer-loyalty-points/retailer-view/<?=$retailer[0]['id']?>" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Loyalty Points Page</a>
              <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Redeem</button>
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
