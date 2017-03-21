<?php
use Cake\ORM\TableRegistry; 
?>
<?php
$this->assign('title', __('Customer') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Customers'), ['controller' => 'Customers', 'action' => 'index']);
$this->Html->addCrumb(__('Edit Customer : '.h($customer->first_name).' '.h($customer->last_name)));
?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Customer</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/customers/edit/<?=$customer->id?>">
            <div style="display:none;">
              <input type="hidden" name="_method" value="PUT">
            </div>
            <div class ="form-group">          
              <div class="input-group" title="Enter First Name*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input class = "form-control" type="text" value = "<?=$customer->first_name?>" name="first_name" required="required" id="first_name" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Last Name*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input class = "form-control" type="text" value = "<?=$customer->last_name?>" name="last_name" required="required" id="last_name" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Email*">
                <span class="input-group-addon">@</span>
                <input class = "form-control" type="email" value = "<?=$customer->email?>" name="email" required="required" id="email" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Contact Number*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input class = "form-control" type="text" value = "<?=$customer->contact?>" name="contact" required="required" id="contact" maxlength="100"> 
              </div>
            </div>
            <div class ="form-group">            
              <div class="input-group" title="Enter Address*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input class = "form-control" type="text" name="address" value = "<?=$customer->address?>" required="required" id="address" maxlength="255">
              </div> 
            </div>
            <div class ="form-group">            
              <div class="input-group" style="z-index: 2;" title="Select Customer Membership Tier*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                <input type="hidden" name="cust_membership_tier_id" value = "<?=$customer->cust_membership_tier_id ?>">
                <select name="cust_membership_tier_id" id="cust-membership-tier-id" required="required" class="selectpicker form-control" title ="Select Customer Membership Tier*" data-live-search="true">
                </style>
                  <?php foreach($custMembershipTiers as $custMembershipTier):?>

                    <?php foreach ($custMembershipTiers as $custMembershipTier): 
                    $session = $this->request->session();
                    $custMembershipTiers = TableRegistry::get('CustMembershipTiers');
                    $membershipTier = $custMembershipTiers
                    ->find()
                    ->where(['id' => $custMembershipTier])
                    ->extract('tier_name');

                    foreach ($membershipTier as $name){
                      $session->write('tierName',$name);
                    }
                    ?>

                    <?php if ($custMembershipTier == $customer->cust_membership_tier_id): ?>
                      <option value="<?=$custMembershipTier?>" selected="selected"><?php echo $session->read('tierName')?></option>
                    <?php else: ?>
                      <option value="<?=$custMembershipTier?>"><?php echo $session->read('tierName')?></option>
                    <?php endif; ?>

                    <?php endforeach; ?>
                <?php endforeach; ?>
                </select>
              </div> 
            </div>
            <div class ="form-group">            
              <div class="input-group" style="z-index: 0;" title="Select Mailing List">
                <input type="hidden" name="mailing_list" value="">
                <label for="mailing-list"><input type="checkbox" name="mailing_list" value="<?=$customer->mailing_list?>" id="mailing-list">&nbsp;Mailing List</label>
              </div> 
            </div>

            <br>
            <div class ="row">
              <a href="/IS3102_Final/customers/index" class="btn btn-md btn-default pull-left" style="border-radius: 8px; margin:5px;">Back to Customers Index</a>
              <button class="btn btn-md btn-default pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Edit Customer</button>
            </div>
            <br>
          </form>
              <!--<?= $this->Form->create($customer) ?>
              <fieldset>
                  <?php
                      echo $this->Form->input('first_name');
                      echo $this->Form->input('last_name');
                      echo $this->Form->input('username');
                      echo $this->Form->input('password');
                      echo $this->Form->input(('confirm_password'), array('type'  =>  'password')); 
                      echo $this->Form->input('email');
                      echo $this->Form->input('contact');
                      echo $this->Form->input('address');
                      echo $this->Form->input('activation_status');
                      echo $this->Form->input('expiry_date');
                      echo $this->Form->input('mailing_list');
                      echo $this->Form->input('cust_membership_tier_id', ['label' => 'Customer Membership Tier'], ['options' => $custMembershipTiers]);
                  ?>
              </fieldset>
              <br>
              <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
              <?= $this->Form->end() ?>-->
        </div>
        </div>
      </div>
              
    </div>
</section>
