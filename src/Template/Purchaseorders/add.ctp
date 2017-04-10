<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Reports') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Purchase Orders'), ['controller' => 'Purchaseorders', 'action' => 'index']);
?>
<?= $this->Element('retailerLeftSideBar'); ?>


<section class="content">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Create New Purchase Order for quotation ID: <?=$quotationID?></h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/PurchaseOrders/add/<?=$quotationID?>/<?=$supplierID?>" enctype="multipart/form-data">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>
            <div class ="form-group">          
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-cloud-download"></i></span>
                    <input class = "form-control" type="file" name="file" id="file" required="required"> 
                  </div>
                </div>

      

      <div class ="form-group">        
        <div class="input-group" style="z-index: 10;" title="Select Location - Supplying the goods.">
          <span class="input-group-addon"><i class="fa fa-fw fa-location-arrow"></i></span>
          <input type="hidden" name="location_id" required="required" value="">
          <select name="location_id" class='selectpicker form-control' title ="Select Location - delivery destination." data-live-search="true">
            <option label=" ">NIL</option> 
            <?php foreach ($locations as $location): ?>
              <option value="<?= $location['id'] ?>"><?= $location['name'] ?></option> 
            <?php endforeach; ?>
          </select>
        </div> 
      </div>


      <div class ="row">
       <a href="/IS3102_Final/PurchaseOrders/index" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Purchase Order Index</a>
       <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Add Purchase Order</button>
     </div>
   </form>
 </div>
</div>
</div>
</section>


