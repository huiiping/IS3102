<?php
$this->assign('title', __('Retailer') . '/' . __('Add'));
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Retailers'), ['controller' => 'Retailers', 'action' => 'index']);
$this->Html->addCrumb(__("Change Retailer's Account Status"));
?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Account Status</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/retailers/changeStatus/<?=$retailer->id?>">
            <div style="display:none;">
              <input type="hidden" name="_method" value="PUT">
            </div>
            <label>Current Account Status of <?=ucfirst($retailer->retailer_name)?> : <?=$retailer->account_status?></label><br><br>
            <div class ="form-group">
              <div class="input-group" style="z-index: 999999999;" title="Select Account Status*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                <input type="hidden" name="account_status" id="account_status" value=""> 
                <select name="account_status" class="selectpicker form-control" required="required" title="Select Account Status*">
                  <?php if ($retailer->account_status == 'Activated'):?>
                    <option value="Banned">Banned</option>
                    <option value="Terminated">Terminated</option>
                  <?php else: ?>
                    <option selected value="Activated">Activated</option>
                  <?php endif; ?>
                </select>
              </div>
            </div>

            <?php if (!($retailer->account_status == 'Activated')): ?>
            <div class ="form-group">
              <div class="input-group" title="Enter New Contract Start Date*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input class = "form-control" type="date" placeholder = "Contract Start Date*" name="contract_start_date" id="contract_start_date" required> 
              </div>
            </div>

            <div class ="form-group">
              <div class="input-group" title="Enter New Contract End Date*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input class = "form-control" type="date" placeholder = "Contract End Date*" name="contract_end_date" id="contract_end_date" required> 
              </div>
            </div>
            <?php endif; ?>

            <br>
            <div class ="row">
              <a href="/IS3102_Final/retailers/index" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Retailers Index</a>
              <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Save Retailer</button>
            </div>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
