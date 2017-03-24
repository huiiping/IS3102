<?php
/**
  * @var \App\View\AppView $this
  */
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
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= __('Create New Memo for '.$suppliername) ?></h3>
            </div>
            <div class="box-body">
            <form method="post" accept-charset="utf-8" action="/IS3102_Final/supplier-memos/add">
              <div style="display:none;">
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="supplier_id" value="<?php echo $supplierid ?>">
                <input type="hidden" name="retailer_employee_id" value="<?php echo $this->request->session()->read('retailer_employee_id') ?>">
              </div>  
              <div class="input-group">
                Remarks: <br >
                <textarea name="remarks" placeholder = "Enter your remarks.." required="required" id="remarks" rows="4" cols="50"></textarea>
              </div>
              <br >
              <input type="submit" class="btn btn-default btn-flat" value="Create New Supplier Memo">
            </form>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>