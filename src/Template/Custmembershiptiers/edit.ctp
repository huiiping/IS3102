<?php
$this->assign('title', __('Customer Membership Tiers') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Customer Membership Tiers'), ['controller' => 'cust-membership-tiers', 'action' => 'index']);
$this->Html->addCrumb(__('Edit Customer Membership Tier'));
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Membership Tier</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/cust-membership-tiers/edit/<?=$custMembershipTier->id?>">
            <div style="display:none;">
              <input type="hidden" name="_method" value="PUT">
            </div>
            <div class ="form-group">          
              <div class="input-group" title="Enter Tier Name*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                <input class = "form-control" type="text" value="<?=$custMembershipTier->tier_name?>" name="tier_name" required="required" id="tier_name" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">          
              <div class="input-group" title="Enter Renewal Cycle (days)*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input class = "form-control" type="number" min="0" value="<?=$custMembershipTier->validity_period?>" name="validity_period" required="required" id="validity_period"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Minimum Spending ($)">
                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                <input class = "form-control" type="text" value="<?=$custMembershipTier->min_spending?>" name="min_spending" id="min_spending" maxlength="100"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Membership Fee ($)">
                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                <input class = "form-control" type="text" value="<?=$custMembershipTier->membership_fee?>" name="membership_fee" id="membership_fee" maxlength="100"> 
              </div>
            </div>
            <div class ="form-group">          
              <div class="input-group" title="Enter Membership Points Earned Per $1 Spent">
                <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
                <input class = "form-control" type="number" min="0" value="<?=$custMembershipTier->membership_pts?>" name="membership_pts" id="membership_pts"> 
              </div>
            </div>
            <div class ="form-group">          
              <div class="input-group" title="Enter Redemption Points Exchange Rate For $1 Discount">
                <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
                <input class = "form-control" type="number" min="0" value="<?=$custMembershipTier->redemption_pts?>" name="redemption_pts" id="redemption_pts"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Discount Rate (%)">
                <span class="input-group-addon">%</span>
                <input class = "form-control" type="text" value="<?=$custMembershipTier->discount_rate?>" name="discount_rate" id="discount_rate" maxlength="100">
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Birthday Discount Rate (%)">
                <span class="input-group-addon">%</span>
                <input class = "form-control" type="text" value="<?=$custMembershipTier->birthday_rate?>" name="birthday_rate" id="birthday_rate" maxlength="100">
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Description">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <textarea rows="5" class = "form-control" type="textarea" name="description" id="description"><?=$custMembershipTier->description?></textarea>
              </div>
            </div>

        <div class ="row">
          <a href="/IS3102_Final/cust-membership-tiers/index" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Membership Tiers Index</a>
          <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Edit Membership Tier</button>
        </div>
      </div>
    </div>
              <!--<?= $this->Form->create($custMembershipTier) ?>
              <fieldset>
                  <?php
                      echo $this->Form->input('tier_name', array('label' => 'Name'));
                      echo $this->Form->input('validity_period', array('label' => 'Renewal Cycle (days)'));
                      echo $this->Form->input('min_spending', array('label' => 'Minimum Spending'));
                      echo $this->Form->input('membership_fee', array('label' => 'Membership Fee'));
                      echo $this->Form->input('membership_pts', array('label' => 'Membership Points Earned Per $1 Spent'));
                      echo $this->Form->input('redemption_pts', array('label' => 'Redemption Points Exchange Rate For $1 Discount'));
                      echo $this->Form->input('discount_rate', array('label' => 'Discount Rate (%)'));
                      echo $this->Form->input('birthday_rate', array('label' => 'Birthday Discount Rate (%)'));
                      echo $this->Form->input('description');
                      echo $this->Form->input('status',['options' => ['Activated' => 'Activated', 'Deactivated' => 'Deactivated']]);
                  ?>
              </fieldset>
              <br>
              <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
              <?= $this->Form->end() ?>-->
  </div>
</section>
