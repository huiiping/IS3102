<?php
$this->assign('title', __('Item') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Items'), ['controller' => 'Items', 'action' => 'index']);
$this->Html->addCrumb(__('Edit Item'));
?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Item</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/items/edit/<?=$item->id?>">
            <div style="display:none;">
              <input type="hidden" name="_method" value="PUT">
            </div>
            <div class ="form-group">          
              <div class="input-group" title="Enter Item Name*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                <input class = "form-control" type="text" placeholder = "Item Name*" name="name" required="required" id="name" value="<?=$item->name?>" maxlength="100"> 
              </div>
            </div>
            <div class ="form-group">            
              <div class="input-group" title="Enter Item Description*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <input class = "form-control" type="text" name="description" placeholder = "Description*" required="required" id="description" value="<?=$item->description?>" maxlength="255">
              </div> 
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter EPC*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
                <input class = "form-control" type="text" placeholder = "EPC*" name="EPC" required="required" id="EPC" value="<?=$item->EPC?>" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Status*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <input class = "form-control" type="text" placeholder = "Status*" name="status" required="required" id="status" value="<?=$item->status?>" maxlength="100"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" style="z-index: 5;" title="Select Product*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                <input type="hidden" name="product_id" id="product_id" value=""> 
                <select name="product_id" class="selectpicker form-control" data-live-search="true" required="required" title="Select Product*">
                    <?php foreach ($prods as $prod): ?>
                      <?php if ($prod->id == $item->product_id): ?>
                        <option selected="selected" value="<?=$prod->id?>"><?php echo $prod->prod_name?></option> 
                      <?php else: ?>
                        <option value="<?=$prod->id?>"><?php echo $prod->prod_name?></option> 
                      <?php endif; ?>
                    <?php endforeach; ?>
                </select>
              </div>
            </div>
            <!--<div class ="form-group">
              <div class="input-group" style="z-index: 4;" title="Select Location">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                <input type="hidden" name="location_id" id="location_id" value=""> 
                <select name="location_id" class="selectpicker form-control" data-live-search="true" required="required" title="Select Location">
                    <?php foreach ($locations as $location): ?>
                      <option value="<?=$location->id?>"><?php echo $location->name?></option> 
                    <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" style="z-index: 3;" title="Select Section">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                <input type="hidden" name="section_id" id="section_id" value=""> 
                <select name="section_id" class="selectpicker form-control" data-live-search="true" required="required" title="Select Section">
                    <?php foreach ($sections as $section): ?>
                      <option value="<?=$section->id?>"><?php echo $section->sec_name?></option> 
                    <?php endforeach; ?>
                </select>
              </div>
            </div>-->
            <br>
            <div class ="row">
              <a href="/IS3102_Final/items/index" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Item Index</a>
              <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Save Item</button>
            </div>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!--<div class="items form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Edit Item') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('EPC');
            echo $this->Form->input('status');
            echo $this->Form->input('product_id', ['options' => $products, 'empty' => true]);
            echo $this->Form->input('section_id');
            echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->
