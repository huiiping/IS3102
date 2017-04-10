<?php
  use Cake\ORM\TableRegistry;
?>

<?php
$this->assign('title', __('Items') . '/' . __('Outbound'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Items'), ['controller' => 'Items', 'action' => 'index']);
$this->Html->addCrumb(__('Manage Outbound Goods'));
?>

<!-- Main content -->
<section class="content">
  <div class="row" style="min-height: 600px">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Manage Outbound Goods</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/items/outbound">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>

            <div class ="form-group">
              <div class="input-group" style="z-index: 6" title="Select Item(s)*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                <input type="hidden" name="item[_ids][]" value=""> 
                <select name="item[_ids][]" class="selectpicker form-control" data-live-search="true" data-selected-text-format="count > 2" title="Select Item(s)*" id="item[_ids][]" multiple required="">
                  <?php
                    $allItems = TableRegistry::get('Items');
                    $items = $allItems
                    ->find()
                    ->where(['location_id' => $lid, 'section_id IS NOT NULL']);
                  ?>
                  <?php foreach ($items as $item): ?>
                    <?php if (in_array($item->id, $_POST['item']['_ids'])): ?>
                      <option selected value="<?=$item->id?>"><?php echo '(EPC '.$item->EPC.') '.$item->name.' (@ Section Id '.$item->section_id.')' ?></option> 
                    <?php else: ?>
                      <option value="<?=$item->id?>"><?php echo '(EPC '.$item->EPC.') '.$item->name.' (@ Section Id '.$item->section_id.')' ?></option> 
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class ="row" align="center">
              <button class="btn btn-md btn-success" type="submit" name="generate_button" style="border-radius: 8px; margin:5px; ">Generate Section(s)</button>
            </div><br>

            <?php if (isset($_POST['generate_button']) || isset($_POST['save_button'])): ?>
              <?php $allItems = TableRegistry::get('Items'); ?>
              <?php foreach ($sections as $section): ?>
                <label><?php echo $section->sec_name.' (Id: '.$section->id.') (Max.: '.$section->space_limit.' | Avaliable: '.$section->available_space.' | Reserved: '.$section->reserve_space.')' ?></label><br>
                <div class ="form-group">
                  <div class="input-group" title="Enter Estimated Space to Free in Units*">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-inbox"></i></span>
                    <input class = "form-control" type="number" placeholder = "Estimated Space to Free in Units*" name="<?=$section->id?>" id="space" min="0" value="<?php echo isset($_POST[$section->id]) ? $_POST[$section->id] : '' ?>"> 
                  </div>
                </div>
              <?php endforeach; ?>
              <div class ="form-group">            
                <div class="input-group" style="z-index: 0;" title="Select Type of Outbound">
                  <label for="type">
                  <input type="checkbox" name="type" id="type" value="1">&nbsp;Transfer All Items to Another Location</label>
                </div> 
              </div>
            <?php endif; ?>

            <script type="text/javascript">
              $('#type').change(function() {
                  $('#div').toggle();
              });
            </script>

            <div id="div" style="display:none">
              <div class ="form-group">
                <div class="input-group" style="z-index: 3;" title="Select Location*">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                  <input type="hidden" name="location_id" value=""> 
                  <select name="location_id" class="selectpicker form-control" data-live-search="true" title="Select Location*" id="location_id">
                    <?php
                      $allLocations = TableRegistry::get('Locations');
                      $locations = $allLocations
                      ->find();
                    ?>
                    <?php foreach ($locations as $location): ?>
                      <?php if (!($location->id == $lid)): ?>
                        <?php if ($location->id == $_POST['location_id']): ?>
                          <option value="<?=$location->id?>" selected><?php echo $location->name ?></option>
                        <?php else: ?>
                          <option value="<?=$location->id?>"><?php echo $location->name ?></option>
                        <?php endif; ?>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class ="form-group">
                <div class="input-group" style="z-index: 2;" title="Select Transfer Order*">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                  <input type="hidden" name="transfer_order" value=""> 
                  <select name="transfer_order" class="selectpicker form-control" data-live-search="true" title="Select Transfer Order*" id="transfer_order">
                    <?php
                      $allTransOrders = TableRegistry::get('TransferOrders');
                      $transOrders = $allTransOrders
                      ->find();
                    ?>
                    <?php foreach ($transOrders as $transOrder): ?>
                      <?php if ($transOrder->id == $_POST['transfer_order']): ?>
                      <option value="<?=$transOrder->id?>" selected><?php echo $transOrder->id ?></option>
                    <?php else: ?>
                      <option value="<?=$transOrder->id?>"><?php echo $transOrder->id ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <br>
            <div class ="row">
              <a href="/IS3102_Final/items/index" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Items Index</a>
              <button class="btn btn-md btn-success pull-right" type="submit" name="save_button" style="border-radius: 8px; margin:5px; ">Save</button>
            </div>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
