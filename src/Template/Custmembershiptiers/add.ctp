<?php
$this->assign('title', __('Customer Membership Tiers') . '/' . __('Add'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Customer Membership Tiers'), ['controller' => 'cust-membership-tiers', 'action' => 'index']);
$this->Html->addCrumb(__('Create New Customer Membership Tier'));
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Create New Membership Tier</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/cust-membership-tiers/add">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>
            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                <input class = "form-control" type="text" placeholder = "Tier Name*" name="tier_name" required="required" id="tier_name" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input class = "form-control" type="number" min="0" placeholder = "Renewal Cycle (days)*" name="validity_period" required="required" id="validity_period"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
                <input class = "form-control" type="text" placeholder = "Minimum Spending" name="min_spending" id="min_spending" maxlength="100"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
                <input class = "form-control" type="text" placeholder = "Membership Fee" name="membership_fee" id="membership_fee" maxlength="100"> 
              </div>
            </div>
            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon">P&nbsp;</span>
                <input class = "form-control" type="number" min="0" placeholder = "Membership Points Earned Per $1 Spent" name="membership_pts" id="membership_pts"> 
              </div>
            </div>
            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon">P&nbsp;</span>
                <input class = "form-control" type="number" min="0" placeholder = "Redemption Points Exchange Rate For $1 Discount" name="redemption_pts" id="redemption_pts"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon">%</span>
                <input class = "form-control" type="text" placeholder = "Discount Rate (%)" name="discount_rate" id="discount_rate" maxlength="100">
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon">%</span>
                <input class = "form-control" type="text" placeholder = "Birthday Discount Rate (%)" name="birthday_rate" id="birthday_rate" maxlength="100">
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <textarea rows="5" class = "form-control" type="textarea" name="description" placeholder = "Description" id="description"></textarea>
              </div>
            </div>

        <div class ="row">
          <a href="/IS3102_Final/cust-membership-tiers/index" class="btn btn-md btn-default pull-left" style="border-radius: 8px; margin:5px;">Back to Membership Tiers Index</a>
          <button class="btn btn-md btn-default pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Create Membership Tier</button>
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
                  ?>
              </fieldset>
              <br>
              <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
              <?= $this->Form->end() ?>-->
      </div>
    </div>
  </div>
</section>
