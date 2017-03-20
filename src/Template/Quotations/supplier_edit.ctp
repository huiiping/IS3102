<?php
$this->assign('title', __('Quotation') . '/' . __('Edit'));
$this->Html->addCrumb(__('Quotations'), ['controller' => 'Quotations', 'action' => 'index']);
$this->Html->addCrumb(__('Edit : ID '.$quotation->id));
?>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Quotation ID: <?= $this->Number->format($quotation->id) ?></h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/quotations/supplier-edit/<?=$quotation->id?>" enctype="multipart/form-data">
            <div style="display:none;">
              <input type="hidden" name="_method" value="PUT">
            </div>
            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-folder-open-o" title="Currently Uploaded Quotation"></i></span>
                <a href="/IS3102_Final/quotations/download/<?=$quotation->id?>"><?= $quotation->fileName ?></a>
            </div>
            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-cloud-download" title="Download Quotation"></i></span>
                <input class = "form-control" type="file" name="file" id="file" >
            </div>
            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-commenting-o"></i></span>
                <textarea name="comments" placeholder = "Enter your comments.." required="required" id="comments" rows="4" cols="55"><?= $quotation->comments ?></textarea>
              </div>
            </div>            
            <br>
            <div class ="row">
              <a href="/IS3102_Final/quotations/index" class="btn btn-md btn-default pull-left" style="border-radius: 8px; margin:5px;">Back to Quotation Index</a>
              <button class="btn btn-md btn-default pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Edit Quotation</button>
            </div>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
