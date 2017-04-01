<?php
  use Cake\ORM\TableRegistry;
  use Cake\Datasource\ConnectionManager;
?>

<!-- Main content -->
<section class="content">
  <div class="row" style="min-height: 600px">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Manage Inbound Goods</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/items/inbound">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>

            <!-- <div class ="form-group">
              <div class="input-group" style="z-index: 5;" title="Select Product(s)*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                <input type="hidden" name="product[_ids][]" value=""> 
                <select name="product[_ids][]" class="selectpicker form-control" data-live-search="true" data-selected-text-format="count > 3" required="required" title="Select Product(s)*" id="product" multiple>
                    <?php foreach ($products as $product): ?>
                      <option value="<?=$product->id?>"><?php echo $product->prod_name?></option> 
                    <?php endforeach; ?>
                </select>
              </div>
            </div> -->

            <div class ="form-group">
              <div class="input-group" style="z-index: 4" title="Select Item(s)*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                <input type="hidden" name="item[_ids][]" value=""> 
                <select name="item[_ids][]" class="selectpicker form-control" data-live-search="true" data-selected-text-format="count > 3" required="required" title="Select Item(s)*" id="item[_ids][]" multiple>
                  <?php
                    $allItems = TableRegistry::get('Items');
                    $items = $allItems
                    ->find()
                    ->where(['section_id IS NULL', 'location_id' => $lid]);
                  ?>
                  <?php foreach ($items as $item): ?>
                    <?php if (in_array($item->id, $_POST['item']['_ids'])): ?>
                      <option selected value="<?=$item->id?>"><?php echo $item->name?></option> 
                    <?php else: ?>
                      <option value="<?=$item->id?>"><?php echo $item->name?></option> 
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class ="form-group">
              <div class="input-group" title="Enter Estimated Space Needed in Units*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-inbox"></i></span>
                <input class = "form-control" type="number" placeholder = "Estimated Space Needed in Units*" name="space" required="required" id="space" value="<?php echo isset($_POST['space']) ? $_POST['space'] : '' ?>" min="0"> 
              </div>
            </div>

            <div class ="row" align="center">
              <button class="btn btn-md btn-success" type="submit" onclick="populate" name="submit_button" style="border-radius: 8px; margin:5px; ">Generate Sections</button>
            </div>

            <script type="text/javascript">
              function populate() {
                <?php
                  $allSections = TableRegistry::get('Sections');
                  $sections = $allSections
                  ->find()
                  ->where(['available_space > $space', 'location_id' => $lid]);
                ?>
              };
            </script>
            <br>

            <div class ="form-group">
              <div class="input-group" style="z-index: 3;" title="Select Avaliable Section(s)*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                <input type="hidden" name="section_id" value=""> 
                <select name="section_id" class="selectpicker form-control" data-live-search="true" data-selected-text-format="count > 3" title="Select Avaliable Section(s)*" id="section_id">
                  <?php
                    $allSections = TableRegistry::get('Sections');
                    $sections = $allSections
                    ->find()
                    ->where(['available_space >' => $space, 'location_id' => $lid]);
                  ?>
                  <?php foreach ($sections as $section): ?>
                    <option value="<?=$section->id?>"><?php echo $section->sec_name.' (Avaliable Space: '.$section->available_space.') (Reserved Space: '.$section->reserve_space.')'?></option> 
                  <?php endforeach; ?>
                </select>
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
