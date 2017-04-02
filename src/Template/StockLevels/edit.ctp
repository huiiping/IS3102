<!-- Main content -->
<section class="content" style="min-height: 550px">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Stock Level</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/StockLevels/edit/<?=$stockLevel->id?>">
            <div style="display:none;">
              <input type="hidden" name="_method" value="PUT">
            </div>
            <div class ="form-group">
              <div class="input-group" style="z-index: 5;" title="Product*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                <input type="hidden" name="product_id" id="product_id" value=""> 
                <select name="product_id" class="selectpicker form-control" data-live-search="true" required="required" title="Select Product*" disabled>
                  <?php foreach ($prods as $prod): ?>
                    <?php if ($prod->id == $stockLevel->product_id) :?>
                      <option selected="selected" value="<?=$prod->id?>"><?php echo $prod->prod_name?></option>
                    <?php else: ?>
                      <option value="<?=$prod->id?>"><?php echo $prod->prod_name?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <!-- <div class ="form-group">
              <div class="input-group" style="z-index: 4;" title="Select Location*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                <input type="hidden" name="location_id" id="location_id" value=""> 
                <select name="location_id" class="selectpicker form-control" data-live-search="true" required="required" title="Select Location*">
                  <?php foreach ($locs as $loc): ?>
                    <?php if ($loc->id == $stockLevel->location_id): ?>
                      <option selected="selected" value="<?=$loc->id?>"><?php echo $loc->name?></option> 
                    <?php else: ?>
                      <option value="<?=$loc->id?>"><?php echo $loc->name?></option> 
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div> -->
            <div class ="form-group">
              <div class="input-group" title="Enter Threshold*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <input class = "form-control" type="number" placeholder = "Threshold*" name="threshold" required="required" id="threshold" value="<?=$stockLevel->threshold?>" min="0"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" style="z-index: 3;" title="Select Employee*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                <input type="hidden" name="retailer_employee_id" id="retailer_employee_id" value=""> 
                <select name="location_id" class="selectpicker form-control" data-live-search="true" required="required" title="Select Employee*">
                    <?php foreach ($employees as $employee): ?>
                      <?php if ($employee->id == $stockLevel->retailer_employee_id): ?>
                        <option selected="selected" value="<?=$employee->id?>"><?php echo $employee->first_name.' '.$employee->last_name?></option>
                      <?php else: ?>
                        <option value="<?=$employee->id?>"><?php echo $employee->first_name.' '.$employee->last_name?></option> 
                      <?php endif; ?>
                    <?php endforeach; ?>
                </select>
              </div>
            </div>
            <input type="hidden" name="retailer_employee_id" id="retailer_employee_id" value="<?=$_SESSION['Auth']['User']['id']?>"> 
            <div class ="row">
              <a href="/IS3102_Final/StockLevels/index" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Stock Level Index</a>
              <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Save Stock Level</button>
            </div>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!--<div class="stockLevels form large-9 medium-8 columns content">
    <?= $this->Form->create($stockLevel) ?>
    <fieldset>
        <legend><?= __('Edit Stock Level') ?></legend>
        <?php
            echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true]);
            echo $this->Form->input('product_id', ['options' => $products, 'empty' => true]);
            echo $this->Form->input('threshold');
            echo $this->Form->input('status');
            echo $this->Form->input('retailer_employee_id', ['options' => $retailerEmployees, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->
