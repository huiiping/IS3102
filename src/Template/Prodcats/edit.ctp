<?php
use Cake\ORM\TableRegistry;
?>

<?php
$this->assign('title', __('ProdCats') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Product Category'), ['controller' => 'ProdCats', 'action' => 'index']);
$this->Html->addCrumb(__('Edit Product Category'));
?>

<section class="content" style="min-height: 550px">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Product Category</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/prodCats/edit/<?=$prodCat->id?>">
            <div style="display:none;">
              <input type="hidden" name="_method" value="PUT">
            </div>

            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                <input class = "form-control" type="text" value = "<?=$prodCat->cat_name?>" name="cat_name" required="required" id="cat_name" maxlength="255"> 
              </div>
            </div>

            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <input class = "form-control" type="text" value = "<?=$prodCat->cat_desc?>" name="cat_desc" required="required" id="cat_desc" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span><input type="hidden" name="parentid" value="">
                <select name="parentid" class='selectpicker form-control' data-live-search="true" title = "Select Parent Category*">
                  <option value="<?= null ?>">No Parent Category</option>
                  <?php foreach ($categories as $category): ?>
                    <option <?php 
                        if($category->id == $prodCat->parentid){ echo("selected") ;} 
                    ?> value="<?= $category->id ?>"><?php echo $category->cat_name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class ="row">
              <a href="/IS3102_Final/prod-cats/index" class="btn btn-md btn-default pull-left" style="border-radius: 8px; margin:5px;">Back to Product Category Index</a>
              <button class="btn btn-md btn-default pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Edit Product Category</button>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
