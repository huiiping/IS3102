<?php
use Cake\ORM\TableRegistry; 
?>
<?php
$this->assign('title', __('Products') . '/' . __('Add2'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Products'), ['controller' => 'Products', 'action' => 'index']);
$this->Html->addCrumb(__('Create New Product Specification'));
?>

<section class="content">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Add Product Specification Items</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/prod-specifications/add">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>

            <div class ="form-group">         
              <div class="input-group" style="z-index: 35;" title="Select Product">
                <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
                <input type="hidden" name="products[_ids]" value="">
                <select name="products[_ids][]" class='selectpicker form-control' title ="Select Product" multiple data-selected-text-format="count > 3" data-live-search="true">
                <?php foreach($products as $prod) : ?>
                   <?php  if($product->id == $prod->id) :?>
                   <option selected="selected" value="<?=$prod->id?>"><?= $prod->prod_name?></option>
                 <?php else: ?>
                  <option value= "<?= $product->id?>"><?= $prod->prod_name?></option> 
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
        </div>


        <div class ="form-group">          
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input class = "form-control" type="text" placeholder = "Product Specification Title*" name="title" required="required" id="title" maxlength="255"> 
          </div>
        </div>

        <div class ="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
            <input class = "form-control" type="text" placeholder = "Description*" name="description" required="required" id="description" maxlength="255"> 
          </div>
        </div>

        <br>

        <div class ="row">
          <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Save Product Specification</button>
        </div>
        <br>
      </form>
    </div>
  </div>
</div>
</div>
</section>
</div>