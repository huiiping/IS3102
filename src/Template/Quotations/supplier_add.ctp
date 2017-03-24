<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?php
$this->assign('title', __('Quotation') . '/' . __('Add'));
$this->Html->addCrumb(__('Quotation'), ['controller' => 'Quotations', 'action' => 'index']);
$this->Html->addCrumb(__('Add'));
?>
  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= __('Submit New Quotation for RFQ ID: '.$rfqid) ?></h3>
            </div>
            <div class="box-body">
            <form method="post" accept-charset="utf-8" action="/IS3102_Final/quotations/supplier-add/<?=$quotation->id?>" enctype="multipart/form-data">
                <div style="display:none;">
                  <input type="hidden" name="_method" value="POST">
                  <input type="hidden" name="rfq_id" value="<?= $rfqid ?>">
                  <input type="hidden" name="supplier_id" value="<?= $supplierid ?>">
                  <input type="hidden" name="status" value="Pending">
                </div>
                <div class ="form-group">          
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-cloud-download" title="Download Quotation"></i></span>
                    <input class = "form-control" type="file" name="file" id="file"> 
                  </div>
                </div>
                <div class ="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-commenting-o"></i></span>
                    <textarea name="comments" placeholder = "Enter your comments.." required="required" id="comments" rows="4" cols="80"></textarea>
                  </div>
                </div>
                <br >
                <input type="submit" class="btn btn-default btn-flat" value="Submit Quotation">
              </form>
            </div>
          </div>
        </div>
      </div>
  </section>
