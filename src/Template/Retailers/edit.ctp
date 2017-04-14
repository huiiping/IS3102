<?php
$this->assign('title', __('Retailers') . '/' . __('Index'));
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Retailers'), ['controller' => 'Retailers', 'action' => 'index']);
$this->Html->addCrumb(__('Edit Retailer'));
?>

<section class="content">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Retailer</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/retailers/edit/<?=$retailer->id?>">
            <div style="display:none;">
              <input type="hidden" name="_method" value="PUT">
            </div>

            <div class ="form-group">         
              <div class="input-group" style="z-index: 2">
                <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                <input class = "form-control" type="text" placeholder = "Enter Payment Term*" name="payment_term" required="required" id="payment_term" value="<?=$retailer->payment_term?>" maxlength="255"> 
              </div> 
            </div>

            <div class ="form-group">         
              <div class="input-group" style="z-index: 25;" title="Select Retailer Account Type*">
                <span class="input-group-addon"><i class="fa fa-fw fa-cart-plus"></i></span>
                <select name="retailer_acc_type_id" class='selectpicker form-control' title ="Select Retailer Account Type*" data-live-search="true">
                  <?php foreach ($retailerAccTypes as $retailerAccType): ?>
                    <?php if ($retailerAccType->id == $retailer->retailer_acc_type_id): ?>
                    <option selected value="<?= $retailerAccType->id ?>"><?php echo $retailerAccType->name ?></option>
                    <?php else: ?>
                    <option value="<?= $retailerAccType->id ?>"><?php echo $retailerAccType->name ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div> 
            </div>
            <div class ="row">
            <a href="/IS3102_Final/retailers/index" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Retailers Index</a>
             <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Save Retailer</button>
           </div>
         </form>
       </div>
     </div>
   </div>
 </section>

              <!-- <?= $this->Form->create($retailer) ?>
              <fieldset>
                  <?php
                      echo $this->Form->input('retailer_name', array('disabled' => true));
                      //echo $this->Form->input('retailer_desc', ['label'=>'Retailer Description']);
                      //echo $this->Form->input('account_status');
                      echo $this->Form->input('payment_term');
                      //echo $this->Form->input('retailer_email');
                      //echo $this->Form->input('address');
                      //echo $this->Form->input('contact');
                      echo $this->Form->input('contract_start_date',  array('type' => 'datetime',));
                      echo $this->Form->input('contract_end_date', array('type' => 'datetime',));
                      echo $this->Form->input('num_of_users', ['label'=>'No. of Users']);
                      echo $this->Form->input('num_of_warehouses', ['label'=>'No. of Warehouses']);
                      echo $this->Form->input('num_of_stores', ['label'=>'No. of Stores']);
                      echo $this->Form->input('num_of_products', ['label'=>'No. of Products']);
                      echo $this->Form->input('retailer_acc_type_id', ['label'=>'Retailer Account Type'], ['options' => $retailerAccTypes]);
                  ?>
              </fieldset>
              <br>
              <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
              <?= $this->Form->end() ?> -->
