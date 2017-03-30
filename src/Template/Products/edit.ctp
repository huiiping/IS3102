<?php
use Cake\ORM\TableRegistry; 
?>

<?php
$this->assign('title', __('Products') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Products'), ['controller' => 'Products', 'action' => 'index']);
$this->Html->addCrumb(__('Edit Product'));
?>

<section class="content" style="min-height: 550px">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Product</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/products/edit/<?=$product->id?>">
            <div style="display:none;">
              <input type="hidden" name="_method" value="PUT">
            </div>

            <div class ="form-group">          
              <div class="input-group" title="Product Name*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                <input class = "form-control" type="text" value = "<?=$product->prod_name?>" name="prod_name" required="required" id="prod_name" maxlength="100"> 
              </div>
            </div>

            <div class ="form-group">          
              <div class="input-group" title="Product Description*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <input class = "form-control" type="text" value = "<?=$product->prod_desc?>" name="prod_desc" required="required" id="prod_desc"> 
              </div>
            </div>

            <div class ="form-group">            
              <div class="input-group" title="Select Product Category*" style="z-index: 3;">
                <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
                <input type="hidden" name="prod_cat_id" value="" required="required">

                <select name="prod_cat_id" class='selectpicker form-control' title ="Select Product Category*"  data-live-search="true" required="required">
                  <?php foreach ($cats as $cat): ?>
                  <?php if ($cat->id == $product->prod_cat_id): ?>
                    <option selected="selected" value="<?=$cat->id?>">
                      <?php echo $cat->cat_name ?></option>
                    <?php else: ?>
                      <option value="<?= $cat->id?>"><?php echo $cat->cat_name ?></option>  
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div> 
            </div>

            <div class ="form-group">          
              <div class="input-group" title="SKU*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
                <input class = "form-control" type="text" value = "<?=$product->SKU?>" name="SKU" required="required" id="SKU" maxlength="100"> 
              </div>
            </div>

            <div class ="form-group">          
              <div class="input-group" title="Store Unit Price ($)*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                <input class = "form-control" type="text" value = "<?=$product->store_unit_price?>" step="0.01" min="0" name="store_unit_price" required="required" id="store_unit_price"> 
              </div>
            </div>

            <div class ="form-group">          
              <div class="input-group" title="Web Store Unit Price ($)">
                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                <input class = "form-control" type="text" value = "<?=$product->web_store_unit_price?>" step="0.01" min="0" name="web_store_unit_price" id="web_store_unit_price"> 
              </div>
            </div> 

            <div class ="form-group">          
              <div class="input-group" title="Barcode">
                <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
                <input class = "form-control" type="text" value="<?=$product->barcode?>" placeholder = "Barcode" name="barcode" id="barcode" maxlength="255"> 
              </div>
            </div>    

            <div class ="form-group">            
              <div class="input-group" title="Add an Existing Promotion" style="z-index: 3;">
                <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
                <input type="hidden" name="promotions[_ids]" value="">

                <select name="promotions[_ids][]" class='selectpicker form-control' title ="Add an Existing Promotion" data-live-search="true" multiple data-selected-text-format="count > 3">
                  <?php foreach ($promos as $promo): ?>
                    <?php foreach ($product->promotions as $prod_promos): ?>
                      <?php if ($promo->promo_name == $prod_promos->promo_name): ?>
                        <option selected="selected" value="<?=$promo->id?>">
                        <?php echo $promo->promo_name ?></option>
                        <?php break; ?>
                      <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if (!($promo->promo_name == $prod_promos->promo_name)): ?>
                        <option value="<?=$promo->id?>"><?php echo $promo->promo_name ?></option> 
                    <?php endif;  ?>
                  <?php endforeach; ?>
                </select>
              </div> 
            </div>

            <div class ="row">
                <a href="/IS3102_Final/products/index" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Products Index</a>
                <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Save Product</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <div class="products form large-9 medium-8 columns content">
  <?= $this->Form->create($product) ?>
  <fieldset>
    <legend><?= __('Edit Product') ?></legend>
    <?php
    echo $this->Form->input('prod_name');
    echo $this->Form->input('prod_desc');
    echo $this->Form->input('store_unit_price');
    echo $this->Form->input('web_store_unit_price');
    echo $this->Form->input('SKU');
    echo $this->Form->input('prod_cat_id', ['options' => $prodCats, 'empty' => true]);
    echo $this->Form->input('prod_specifications._id', ['options' => $prodSpecifications]);
    echo $this->Form->input('promotions._ids', ['options' => $promotions]);
    ?>
  </fieldset>
  <?= $this->Form->button(__('Submit')) ?>
  <?= $this->Form->end() ?>
</div> -->
