<?php
$this->assign('title', __('Report') . '/' . __('Add'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Create New Report'));
?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Generate Report</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/reports/other">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>
            
            <div class ="form-group">
              <div class="input-group" style="z-index: 6;" title="Select Report Type*">
                <span class="input-group-addon"><i class="fa fa-book"></i></span>
                <input type="hidden" name="report" id="report" value=""> 
                <select id="selectReport" name="report" class="selectpicker form-control" data-live-search="true" required="required" title="Select Report Type*" onchange="func1()">
                  <option value= 1>Retailer User Statistics Report</option> 
                  <option value= 2>Retailer User Monthly Statistics Report</option> 
                  <option value= 3>Retailer User Cumulative Statistics Report</option>
                  <option value= 4>Transaction Statistics Monthly Report</option>
                  <option value= 5>Transaction Statistics Cumulative Report</option>  
                  <option value="Retailer System Usage Report">Retailer System Usage Report</option> 
                  
                  <option value="Product Type Statistics Report">Product Type Statistics Report</option> 
                  <option value="Alerts Statistics Report">Alerts Statistics Report</option> 
                  <option value="Sales Report">Sales Report</option> 
                  <option value="Sales Forecasting">Sales Forecasting</option>
                </select>
              </div>
            </div>

            <div id="divTime" class ="form-group">
              <div class="input-group" style="z-index: 5;">
                <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                <input type="hidden" name="time" id="time" value=""> 
                <select name="time" class="selectpicker form-control" data-live-search="true" required="required" title="Select Time*">

                  <?php $i=1; foreach($timePeriods as $timePeriod):?>
                  <option value= <?= $i ?>><?= $timePeriod?></option> 
                  <?php $i++; endforeach ;?>
                </select>
              </div>
            </div>

            <br>
            <div class ="row">
              <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Generate Report</button>
            </div>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  func1(){
    if(document.getElementById('selectReport').value == 1) {
     document.getElementById('divTime').style.display = "none";
   }else{
    document.getElementById('divTime').style.display = "block";
   }
 }

</script>