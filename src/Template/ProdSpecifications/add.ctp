<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;
?>

<?= $this->Element('retailerLeftSideBar'); ?>


<!-- Main Content -->
<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="box box-primary">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Add New Product Specification</h3>
            </div>
          </div>
          <div class="main" style="padding: 10px 20px;">

            <form method="post" accept-charset="utf-8" action="/IS3102_Final/prod-specifications/add">
              <div style="display:none;">
                <input type="hidden" name="_method" value="POST">
              </div>


              <?php 
              $session = $this->request->session();
              $productref = $session->read('product');
              echo $this->Form->input('products._ids', ['options' => $products]);
              ?>

              <label>Product</label><br>
              <div class ="form-group">            
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
                  <input type="text" name="products._ids" value="<?= $productref ?>" readonly>
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
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input class = "form-control" type="text" placeholder = "Description*" name="description" required="required" id="description" maxlength="255"> 
                </div>
              </div>

              <br>

              <div class ="row">
                <button class="btn btn-md btn-default pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Add Product Specification</button>
              </div>
              <br>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<!-- <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
<?= $this->Form->end() ?>
<?= $this->Form->create($prodSpecification) ?>
                <fieldset>
                    <?php

                        echo $this->Form->input('title');
                        echo $this->Form->input('description');
                        echo $this->Form->input('products._ids', ['options' => $products]);
                        ?> -->

