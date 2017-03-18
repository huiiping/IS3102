<?php
use Cake\ORM\TableRegistry;
?>

<?php
$this->assign('title', __('ProdCats') . '/' . __('Add'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Product Category'), ['controller' => 'ProdCats', 'action' => 'index']);
$this->Html->addCrumb(__('Create New Product Category'));
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Create New Product Category</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/prod-cats/add">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>

            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input class = "form-control" type="text" placeholder = "Category Name*" name="cat_name" required="required" id="cat_name" maxlength="255"> 
              </div>
            </div>

            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input class = "form-control" type="text" placeholder = "Category Description*" name="cat_desc" required="required" id="cat_desc" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span><input type="hidden" name="parentid" value="">
                <select name="parentid" class='selectpicker form-control' single data-selected-text-format="count > 3" title = "Select Parent Category*">
                  <option value="<?= null ?>">No Parent Category</option>
                  <?php foreach ($prodCats as $category): ?>
                    <option value="<?= $category->id ?>"><?php echo $category->cat_name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
         <div class ="row">
         <button class="btn btn-md btn-primary pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Add Product Category</button>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>
