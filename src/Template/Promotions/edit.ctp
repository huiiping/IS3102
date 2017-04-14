<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Promotions') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Promotions'), ['controller' => 'Promotions', 'action' => 'index']);
$this->Html->addCrumb(__('Edit Promotion'));
?>

<section class="content">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Promotion</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/promotions/edit/<?=$promotion->id?>">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>

            <div class ="form-group">         
             <div class ="form-group">          
              <div class="input-group" title="Promotion Name*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                <input class = "form-control" type="text" placeholder = "Promotion Name*" name="promo_name" value = "<?=$promotion->promo_name ?>" required="required" id="promo_name"> 
              </div>
            </div>

            <div class ="form-group">
              <div class="input-group" title="Promotion Description*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <textarea rows="5" class = "form-control" type="textarea" name="promo_desc" value = "<?=$promotion->promo_desc ?>" required="required" placeholder = "Promotion Description*" id="promo_desc"></textarea>
              </div>
            </div>

            <div class ="form-group">    
              <div class="input-group" style="z-index: 20;" title="Select Start Date*">
                <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                <input type="hidden" name="start_date" value="">
                <input class = "form-control" type="date" name="start_date" placeholder = "Select Start Date*" value = "<?=$promotion->start_date->i18nFormat('yyyy-MM-dd') ?>" required=required id="start_date" maxlength="255">
              </div> 
            </div>

            <div class ="form-group">    
              <div class="input-group" style="z-index: 20;" title="Select End Date*">
                <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                <input type="hidden" name="end_date" value="">
                <input class = "form-control" type="date" name="end_date" placeholder = "Select End Date*" value = "<?=$promotion->end_date->i18nFormat('yyyy-MM-dd') ?>" required=required id="end_date" maxlength="255">
              </div> 
            </div>

            <div class ="form-group">          
              <div class="input-group" title="First Voucher Number">
                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                <input class = "form-control" type="text" placeholder = "First Voucher Number" value = "<?=$promotion->first_voucher_num ?>" name="first_voucher_num" id="first_voucher_num"> 
              </div>
            </div>

            <div class ="form-group">          
              <div class="input-group" title="Last Voucher Number">
                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                <input class = "form-control" type="text" placeholder = "Last Voucher Number" value = "<?=$promotion->last_voucher_num ?>" name="last_voucher_num" id="last_voucher_num"> 
              </div>
            </div>

            <div class ="form-group">          
              <div class="input-group" title="Discount Rate">
                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                <input class = "form-control" type="text" placeholder = "Discount Rate" value = "<?=$promotion->discount_rate ?>" name="discount_rate" id="discount_rate"> 
              </div>
            </div>

            <div class ="form-group">          
              <div class="input-group" title="Applicable Credit Card(s)">
                <span class="input-group-addon"><i class="fa fa-fw fa-credit-card"></i></span>
                <input class = "form-control" type="text" placeholder = "Applicable Credit Card(s)" value = "<?=$promotion->credit_card_type ?>" name="credit_card_type" id="credit_card_type"> 
              </div>
            </div>

            <div class ="form-group">        
              <div class="input-group" style="z-index: 10;" title="Applicable to Customer Tier(s)">
                <span class="input-group-addon"><i class="fa fa-fw fa-users"></i></span>
                <input type="hidden" name="cust_membership_tiers[_ids]" value="">
                <select name="cust_membership_tiers[_ids][]" class='selectpicker form-control' title ="Applicable to Customer Tier(s)" data-live-search="true">
                  <option label=" ">NIL</option> 
                  <?php foreach ($custMembershipTiers as $custMembershipTier): ?>
                    <option><?php echo $custMembershipTier->tier_name ?></option> 
                  <?php endforeach; ?>
                </select>
              </div> 
            </div>

            <div class ="form-group">        
              <div class="input-group" style="z-index: 10;" title="Applicable to Product Type(s)">
                <span class="input-group-addon"><i class="fa fa-fw fa-users"></i></span>
                <input type="hidden" name="products[_ids]" value="">
                <select name="products[_ids][]" class='selectpicker form-control' title ="Applicable to Product Type(s)" data-live-search="true">
                <?php foreach ($products as $product): ?> 

                    <?php if (!empty($promotion->products)): ?> 
                      <?php foreach ($promotion->products as $products): ?> 
                        <?php if ($products->prod_name == $product->prod_name): ?> 
                          <option selected="selected" value="<?= $product->id ?>"><?php echo $product->prod_name ?></option> <!-- select and print option -->
                          <?php break; ?> <!-- and break the loop -->
                        <?php endif; ?>
                      <?php endforeach; ?> 
                      <?php if (!($products->prod_name == $product->prod_name)): ?> <!-- if it is not the employee's role -->
                        <option value="<?= $product->id ?>"><?php echo $product->prod_name ?></option> <!-- print option -->
                      <?php endif; ?>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div> 
            </div>
            <br>

            <?php

            echo $this->Form->input('first_voucher_num', array('label' => 'Voucher Starting Number'));
            echo $this->Form->input('last_voucher_num', array('label' => 'Voucher Ending Number'));
            echo $this->Form->input('discount_rate', array('label' => 'Discount Rate (%) '));
            echo $this->Form->input('credit_card_type', array('label' => 'Applicable Credit Card(s)'));
            $session = $this->request->session();
            echo $this->Form->hidden('retailer_employee_id', ['value'=>$session->read('retailer_employee_id')]);
                        //echo $this->Form->input('retailer_employee_id', ['options' => $retailerEmployees, 'empty' => true]);
                        //echo $this->Form->input('customer_tier', array('label' => 'Applicable to Customer Tier(s)')); 
            echo $this->Form->input('cust_membership_tiers._ids', array('options' => $custMembershipTiers, 'label' => 'Applicable to Customer Tier(s)'));
            echo $this->Form->input('prod_types._ids', array('options' => $prodTypes, 'label' => 'Applicable to Product Type(s)'));
            ?>

            <div class="box-body">
              <p id="emailField1" style="visibility:hidden">Title</p>
              <input type="hidden" name="title" id="title"><br >
              <p id="emailField2" style="visibility:hidden">Body</p>
              <input type="hidden" name="body" id="body"><br >

            </div>
            <script>
              function myFunction() {

                if(document.getElementById("title").type == "text"){
                  document.getElementById("title").type = "hidden";
                } else {
                  document.getElementById("title").type = "text";
                }

                if(document.getElementById("body").type == "text"){
                  document.getElementById("body").type = "hidden";
                } else {
                  document.getElementById("body").type = "text";
                }

                if(document.getElementById("emailField1").style.visibility == "hidden"){
                  document.getElementById("emailField1").style.visibility = "";
                } else {
                  document.getElementById("emailField1").style.visibility = "hidden";
                }

                if(document.getElementById("emailField2").style.visibility == "hidden"){
                  document.getElementById("emailField2").style.visibility = "";
                } else {
                  document.getElementById("emailField2").style.visibility = "hidden";
                }                    
              }
            </script>
          </fieldset>
          <br>
          <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
          <button type="button" onclick="myFunction()" class="btn btn-default btn-flat">Generate Email</button>
          <?= $this->Form->end() ?>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
