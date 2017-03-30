<?php
use Cake\ORM\TableRegistry; 
?>

<?php
$this->assign('title', __('Products') . '/' . __('Add'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Products'), ['controller' => 'Products', 'action' => 'index']);
$this->Html->addCrumb(__('Create New Product'));
?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Create New Product</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/products/add">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>

          <div class ="form-group">          
            <div class="input-group" title="Product Name*">
              <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
              <input class = "form-control" type="text" placeholder = "Product Name*" name="prod_name" required="required" id=prod_name" maxlength="100"> 
            </div>
          </div>

          <div class ="form-group">          
            <div class="input-group" title="Product Description*">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
              <input class = "form-control" type="text" placeholder = "Product Description*" name="prod_desc" required="required" id="prod_desc"> 
            </div>
          </div>

            <div class ="form-group">            
              <div class="input-group" title="Select Product Category*" style="z-index: 3;">
                <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
                <input type="hidden" name="prod_cat_id" value="" required="required">

                <select name="prod_cat_id" class='selectpicker form-control' title ="Select Product Category*" data-live-search="true" required="required">
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

                  <option value="<?= $prodCat?>"><?php echo $session->read('catName')?></option> 
                <?php endforeach; ?>
              </select>
            </div> 
          </div>

          <div class ="form-group">          
            <div class="input-group" title="SKU*">
              <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
              <input class = "form-control" type="text" placeholder = "SKU*" name="SKU" required="required" id="SKU" maxlength="100"> 
            </div>
          </div>

          <div class ="form-group">          
          <div class="input-group" title="Store Unit Price ($)">
              <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
              <input class = "form-control" type="number" type="number" step="0.01" min="0" placeholder = "Store Unit Price" name="store_unit_price" id="store_unit_price"> 
            </div>
          </div>

          <div class ="form-group">          
            <div class="input-group" title="Web Store Unit Price ($)">
              <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
              <input class = "form-control" type="number" type="number" step="0.01" min="0" placeholder = "Web Store Unit Price" name="web_store_unit_price" id="web_store_unit_price"> 
            </div>
          </div>  

          <div class ="form-group">          
            <div class="input-group" title="Barcode">
              <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
              <input class = "form-control" type="text" placeholder = "Barcode" name="barcode" id="barcode" maxlength="255"> 
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
                $promos = TableRegistry::get('Promotions');
                $promo = $promos
                ->find()
                ->where(['id' => $promotion])
                ->extract('promo_name');

                foreach ($promo as $name){
                  $session->write('promoName',$name);
                }?>
                <option value="<?= $promotion?>"><?php echo $session->read('promoName')?></option> 
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



<!--<?php
echo $this->Form->input('prod_cat_id', ['options' => $prodCats, 'empty' => true]);
            // echo $this->Form->input('prod_specifications._title', array('type' => 'hidden');
            //     // prod_specifications._ids', ['options' => $prodSpecifications]);
echo $this->Form->input('promotions._ids', ['options' => $promotions]);

?>

<button class="btn btn-md btn-primary pull-left" type="submit" a href="/IS3102_Final/prod-specifications/add" style="border-radius: 8px; margin:5px;">Add Product Specification</a>

</fieldset>

<?php
if(isset($_POST['submit'])){
// Fetching variables of the form which travels in URL
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    if($name !=''&& $email !=''&& $contact !=''&& $address !='')
    {
//  To redirect form on a particular page
        header("Location:https://www.formget.com/app/");
    }
    else{
        ?><span><?php echo "Please fill all fields.....!!!!!!!!!!!!";?></span> <?php
    }
}
?>

    <!-- <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
  </div>-->
