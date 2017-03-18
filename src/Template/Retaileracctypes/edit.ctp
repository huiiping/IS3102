<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Intrasys') );
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Retailer Account Types'), ['controller' => 'RetailerAccTypes', 'action' => 'index']);

?>
<?= $this->Element('intrasysLeftSideBar'); ?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="box box-primary">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Retailer Account Type</h3>
                    </div>
                </div>
                <div class="main" style="padding: 10px 20px;">

                    <form method="post" accept-charset="utf-8" action="/IS3102_Final/retailer-acc-types/edit/<?=$retailerAccType->id?>">
                        <div style="display:none;">
                            <input type="hidden" name="_method" value="PUT">
                        </div>
                        <div class ="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input class = "form-control" type="text" placeholder = "Name*" value = "<?=$retailerAccType->name?>" name="name" required="required" id="name" maxlength="255">
                            </div>
                        </div>
                        <div class ="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input class = "form-control" type="int" placeholder = "No. of Users*" value = "<?=$retailerAccType->num_of_users?>" name="num_of_users" required="required" id="num_of_users" maxlength="255">
                            </div>
                        </div>
                        <div class ="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input class = "form-control" type="int" placeholder = "No. of Warehouses*" value = "<?=$retailerAccType->num_of_warehouses?>" name="num_of_warehouses" required="required" id="num_of_warehouses" maxlength="255">
                            </div>
                        </div>
                        <div class ="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input class = "form-control" type="int" placeholder = "No. of Stores*" value = "<?=$retailerAccType->num_of_stores?>" name="num_of_stores" required="required" id="num_of_stores" maxlength="100">
                            </div>
                        </div>
                        <div class ="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input class = "form-control" type="int" placeholder = "No. of Products*" name="num_of_products" value = "<?=$retailerAccType->num_of_products?>" required="required" id="num_of_products" maxlength="255">
                            </div>
                        </div>
                        <br>
                        <div class ="row">
                            <a href="/IS3102_Final/retailer-acc-types/index" class="btn btn-md btn-default pull-left" style="border-radius: 8px; margin:5px;">Back to Retailer Acc Type Index</a>
                            <button class="btn btn-md btn-default pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Edit Acc Type</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
