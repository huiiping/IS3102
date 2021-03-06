<?php
$this->assign('title', __('Location') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Locations'), ['controller' => 'Locations', 'action' => 'index']);
$this->Html->addCrumb(__('Edit Location'));
?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Location</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/locations/edit/<?= $location->id?>">
            <div style="display:none;">
              <input type="hidden" name="_method" value="PUT">
            </div>
            <div class ="form-group">          
              <div class="input-group" title="Enter Location Name*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                <input class = "form-control" type="text" placeholder = "Location Name*" value="<?= $location->name ?>" name="name" required="required" id="name" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">            
              <div class="input-group" title="Enter Address*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input class = "form-control" type="text" name="address" placeholder = "Address*" value="<?= $location->address ?>" required="required" id="address" maxlength="255">
              </div> 
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Contact Number*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input class = "form-control" type="text" placeholder = "Contact Number*" name="contact" value="<?= $location->contact ?>" required="required" id="contact" maxlength="100"> 
              </div>
            </div>
            <!-- 
            <div class ="form-group">
              <div class="input-group" style="z-index: 999999999;" title="Select Location Type*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                <input type="hidden" name="type" id="type" value=""> 
                <select name="type" class="selectpicker form-control" required="required" title="Select Location Type*">
                <?php if($location->type == "Warehouse"): ?>
                    <option value="Warehouse" selected>Warehouse</option>
                    <option value="Store">Store</option>
                <?php else: ?>
                    <option value="Warehouse">Warehouse</option>
                    <option value="Store" selected>Store</option>
                <?php endif; ?>
                </select>
              </div>
            </div> -->
            <br>
            <div class ="row">
              <a href="/IS3102_Final/locations/index" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Location Index</a>
              <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Save Location</button>
            </div>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!--<div class="locations form large-9 medium-8 columns content">
    <?= $this->Form->create($location) ?>
    <fieldset>
        <legend><?= __('Edit Location') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('address');
            echo $this->Form->input('contact');
            echo $this->Form->input('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->
