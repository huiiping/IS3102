<?php
use Cake\ORM\TableRegistry; 
?>
<?php
$this->assign('title', __('Products') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Products'), ['controller' => 'Products', 'action' => 'index']);
$this->Html->addCrumb(__('Edit Product'));

?>
<section class="content">
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
              <div class="input-group" title="Select Product Category*" style="z-index: 3;">
                <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
                <input type="hidden" name="prod_cat_id" value="" required="required">

                <select name="prod_cat_id" class='selectpicker form-control' data-live-search="true">
                  <?php foreach ($prodCats as $prodCat): 
                  $session = $this->request->session();
                  $productCats = TableRegistry::get('ProdCats');
                  $productCat = $productCats
                  ->find()
                  ->where(['id' => $prodCat])
                  ->extract('cat_name');

                  foreach ($productCat as $name){
                    $session->write('catName',$name);
                  }
                  ?>
                  <?php if ($prodCat == $product->prod_cat_id): ?>
                    <option selected="selected">
                      <?php echo $session->read('catName')?></option>
                    <?php else: ?>
                      <option value="<?= $prodCat?>"><?php echo $session->read('catName')?></option>  
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div> 
            </div>

            <div class ="form-group">          
              <div class="input-group" title="Product Name*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                <input class = "form-control" type="text" value = "<?=$product->prod_name?>" name="prod_name" required="required" id="prod_name" maxlength="255"> 
              </div>
            </div>

            <div class ="form-group">          
              <div class="input-group" title="Product Description*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <input class = "form-control" type="text" value = "<?=$product->prod_desc?>" name="prod_desc" required="required" id="prod_desc" maxlength="255"> 
              </div>
            </div>

            <div class ="form-group">          
              <div class="input-group" title="SKU*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
                <input class = "form-control" type="text" value = "<?=$product->SKU?>" name="SKU" required="required" id="SKU" maxlength="255"> 
              </div>
            </div>

            <div class ="form-group">          
              <div class="input-group" title="Store Unit Price*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                <input class = "form-control" type="text" value = "<?=$product->store_unit_price?>" name="store_unit_price" required="required" id="store_unit_price" maxlength="255"> 
              </div>
            </div>

            <div class ="form-group">          
              <div class="input-group" title="Web Store Unit Price">
                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                <input class = "form-control" type="text" value = "<?=$product->web_store_unit_price?>" name="web_store_unit_price" id="web_store_unit_price" maxlength="255" title="web_store_unit_price"> 
              </div>
            </div> 

            <div class ="form-group">            
              <div class="input-group" title="Add an Existing Promotion" style="z-index: 3;">
                <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
                <input type="hidden" name="promotions[_ids]" value="">

                <select name="promotions[_ids][]" class='selectpicker form-control' title ="Add an Existing Promotion" data-live-search="true" multiple data-selected-text-format="count > 3">
                  <option value=" ">No Promotion</option>
                  <?php foreach ($promotions as $promotion): 
                  $session = $this->request->session();
                  $promotions = TableRegistry::get('Promotions');
                  $promo = $promotions
                  ->find()
                  ->where(['id' => $promotion])
                  ->extract('promo_name');

                  foreach ($promo as $name){
                    $session->write('promoName',$name);
                    } ?>
                    <?php if ($promotion == $promo->id): ?>
                      <option selected="selected">
                        <?php echo $session->read('promoName')?></option>
                      <?php else: ?>

                      <option value="<?= $promotion?>"><?php echo $session->read('promoName')?></option> 
                    <?php endif;  ?>
                  <?php endforeach; ?>
                 

                  <!-- <?php foreach ($promotions as $promotion): ?>
                  <?php foreach ($promos as $promo): ?>
                  <?php if ($promotion->id == $promo->id) :?>
                  <option selected="selected">
                    <?php echo $promo->id?></option>
                    <?php break; ?>
                  <?php endif; ?>
                <?php endforeach; ?> 
                <?php if (!($promotion->id == $promo->id)) :?>
                <option><?php echo $promotion ?></option>
              <?php endif; ?>
            <?php endforeach; ?> -->
          </select>
        </div> 
      </div>

      <div class ="row">
        <button class="btn btn-md btn-default pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Edit Product</button>
      </div>

    </form>
  </div>
</div>
</div>
</div>
</section>
</div>
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
