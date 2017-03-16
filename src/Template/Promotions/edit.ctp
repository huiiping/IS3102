<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Reports') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Promotions'), ['controller' => 'Promotions', 'action' => 'index']);

?>
<?= $this->Element('retailerLeftSideBar'); ?>

<!-- Main Content -->
<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
  </section>
  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Edit Promotion') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($promotion) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input('start_date', array(
                          'label' => 'Start Date (GMT)',
                          'type' => 'datetime'));
                        echo $this->Form->input('end_date', array(
                          'label' => 'End Date (GMT)',
                          'type' => 'datetime'));
                        echo $this->Form->input('promo_desc', array('label' => 'Description'));
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
